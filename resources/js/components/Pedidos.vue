<template>
    <div>
        <div>
            <button @click="resetDB" class="btn-primary btn-sm float-end">Reset DB</button>
        </div>
        <div class="d-flex justify-content-center mt-4 ">
          <span class="fs-1">Lista de Pedidos</span>
        </div>
        <div class="container" >
            <div class="row">
                <div style="cursor:pointer" @click="selectGateway(gat)" v-for="gat in gateways" :class="'align-items-center bg-opacity-25 bg-secondary col d-flex mx-5 rounded-3 shadow py-3 my-3 '+ (gateSelected.id == gat.id ? ' selected' :'')">
                    <div class="fs-2 text-center w-100 " style="text-shadow: 1px 1px 4px black;">{{ gat.descricao }}</div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="table-responsive" style="min-height:200px;max-height:600px">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nº</th>
                            <th>Cliente</th>
                            <th class="text-center">Data</th>
                            <th class="text-center">Frete</th>
                            <th class="text-center">Total</th>
                            <th>Loja</th>
                            <th class="text-center">Situação</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody v-if="lista.length > 0">
                        <tr v-for="ped in lista">
                            <td class="text-center">{{ ped.id }}</td>
                            <td>{{ ped.cliente.nome}}</td>
                            <td class="text-center date">{{ formatDate(ped.data) }}</td>
                            <td class="text-center money">R$ {{ formatMoneyLocal(ped.valor_frete) }}</td>
                            <td class="text-center money">R$ {{ formatMoneyLocal(ped.valor_total) }}</td>
                            <td>{{ ped.loja.nome }}</td>
                            <td class="text-center align-middle">
                                <span :class="bagdeDinamic(ped)">{{ ped.situacao.descricao }}</span>
                            </td>
                            <td>
                                <div v-if="ped.pagamento.id_formapagto < 3 ">
                                    <button style="cursor:not-allowed" v-if="ped.id_situacao == 1"  title="Processar" class="btn btn-primary btn-sm">
                                        <i class="align-middle pb-1 material-icons fs-6">attach_money</i>
                                    </button>
                                </div>
                                <div v-else>
                                    <button @click="payment(ped)" v-if="ped.id_situacao == 1"  title="Processar" class="btn btn-primary btn-sm">
                                        <i class="align-middle pb-1 material-icons fs-6">credit_card</i>
                                    </button>
                                </div>
                                <button style="cursor:not-allowed"  v-if="ped.id_situacao == 3" title="Cancelado" class="btn btn-danger btn-sm disabled">
                                    <i class="align-middle pb-1 material-icons fs-6">close</i>
                                </button>
                                <button style="cursor:not-allowed"  v-if="ped.id_situacao == 2" title="Pago" class="btn btn-success btn-sm disabled">
                                    <i class="align-middle pb-1 material-icons fs-6">done</i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center" v-if="lista.length == 0">
                    <<< Nenhum Registro Encontrado >>>
                </div>
            </div> 
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-3 py-1">
                        <div><i class="align-middle bg-primary fs-5 material-icons p-1 rounded text-white">attach_money</i>&nbsp;Pendente - Boleto ou Depósito Bancário</div>
                    </div>
                    <div class="col-12 col-sm-3 py-1">
                        <div><i class="align-middle bg-primary fs-5 material-icons p-1 rounded text-white">credit_card</i>&nbsp;Pendente - Cartão de Crédito</div>
                    </div>
                    <div class="col-12 col-sm-3 py-1">
                        <div><i class="align-middle bg-success fs-5 material-icons p-1 rounded text-white">done</i>&nbsp;Pago</div>
                    </div>
                    <div class="col-12 col-sm-3 py-1">
                        <div><i class="align-middle bg-danger fs-5 material-icons p-1 rounded text-white">done</i>&nbsp;Cancelado</div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal" id="modal-message">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div :class="'fs-4 text-center w-100 alert-link alert-'+ modal.class">
                            {{ modal.header}}
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="fs-5 text-center">
                            {{ modal.message }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-bs-dismiss="modal" class="btn btn-primary">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props:{
        pedidos: Array,
        gateways: Array
    },
    data(){
        return {
            listaGeral:[],
            lista: [],
            gateSelected: {},
            modal: {
                header:'',
                message:'',
                class: '',
            },
        }
    },
    mounted() {
        spinnerON();
        setTimeout(function(){
            spinnerOFF();
        }.bind(this),500);
        this.listaGeral = this.pedidos;
        this.selectGateway(this.gateways.find( el => el.id = 1));
       
    },
    methods: {
        resetDB(){
            if(confirm("Deseja realmente resetar a base de dados para o estado inicial?")){
                spinnerON();
                axios.get('/reset').then(response => window.location.reload());
            }
        },
        selectGateway(gat){
            spinnerON();
            setTimeout(function(){
                spinnerOFF();
            }.bind(this),500);
            this.gateSelected = gat;
            this.lista = [];
            this.lista = this.listaGeral.filter( p => p.gateway.id == gat.id);
            
            this.$forceUpdate();
        },
        bagdeDinamic(ped){
            var classe = 'badge fs-6 w-100 ';
            switch(ped.id_situacao){
                case 1:
                    classe += 'bg-warning text-black';
                    break;
                case 2:
                    classe += 'bg-success';
                    break;
                case 3:
                    classe += 'bg-danger';
                    break;
            }

            return classe;

        },
        payment(pedido){
            if(pedido.gateway.id == 1){
                spinnerON();
                axios.post('payment',{pedido:pedido})
                    .then(function(response){ 
                        if(response.status == 200 ){
                            let retorno = response.data.resp;
                            if(retorno.Error || Object.keys(retorno).length === 0){
                                spinnerOFF();
                                alert(retorno.Message ?? 'Operação Não Realizada');
                            }else{
                                this.managerResult(retorno,pedido);
                                this.listaGeral = response.data.lista;
                                this.selectGateway(this.gateSelected); 
                            }
                        }else{
                            spinnerOFF();
                            alert(retorno.Message ?? 'Operação Não Realizada');
                        } 
                }.bind(this));
            }else{
                alert('Gateway não configurado!');
            }
        },
        managerResult(retorno,pedido){
            let result = 'Erro Não Identificado';
            switch(retorno['Transaction_code']){
                case '00':
                    result = 'Operação Realizada com Sucesso';
                    this.modal.class = 'success';
                    break;
                case '01':
                    result = 'Operação em Análise'; 
                    this.modal.class = 'primary';
                    break;
                case '02':
                    result = 'Estorno';
                    this.modal.class = 'danger';
                    break;
                case '03':
                    result = 'Operação Recusada';
                    this.modal.class = 'danger';
                    break;
                case '04':
                    result = 'Operação Recusada';
                    this.modal.class = 'danger';
                    break;

            }
            this.modal.header = result;
            this.modal.message = retorno.Message;
            $("#modal-message").modal('show');
        },
        formatMoneyLocal(value){
            return value.replace('.',',').replace(/\d(?=\d{3})/g,"$&.")
        },
        formatDate(value){
            if (value) {
                let dataf = new Date(value);
                let dia  = dataf.getDate().toString().padStart(2, '0');
                let mes  = (dataf.getMonth()+1).toString().padStart(2, '0');
                let ano  = dataf.getFullYear();
                return `${dia}/${mes}/${ano}`;
            }
        }
        
    }
}
</script>
<style>
.selected{
    background-color: #101060 !important;
    color: white;
    
}
.selected div:first-child{
    text-shadow: 1px 1px 4px white !important
}
</style>