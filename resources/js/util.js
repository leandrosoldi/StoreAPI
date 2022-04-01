window.formatCPFCNPJTableColumns = function() {
    $('tbody tr td.cpf-cnpj').each(function() {
        var value = $(this).text().trim();

        if (value) {
            $(this).text(formatarCPFCNPJ(value));
        }
    });
}

window.formatarCPFCNPJ = function(str) {
    var length = str ? str.length : 0;

    if (length == 11) {
        return formatarCPF(str);
    } else if (length == 14) {
        return formatarCNPJ(str);
    } else {
        return str;
    }
}

window.formatarCPF = function(str) {
    return str.replace(/^(\d{3})(\d{3})(\d{3})(\d{2}).*/, '$1.$2.$3-$4');
}

window.formatarCNPJ = function(str) {
    return str.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2}).*/, '$1.$2.$3/$4-$5');
}


window.formatDateTableColumns = function() {
    $('tbody tr td.date').each(function() {
        var data = $(this).text().trim();
        if (data) {
            let dataf = new Date(data);
            let dia  = dataf.getDate().toString().padStart(2, '0');
            let mes  = (dataf.getMonth()+1).toString().padStart(2, '0');
            let ano  = dataf.getFullYear();
            $(this).text(`${dia}/${mes}/${ano}`);

        }
    });
}

window.formatMoney = function(){
    $('tbody tr td.money').each(function() {
        var valor = $(this).text();
        if (valor) {
            $(this).text(valor.replace('.',',').replace(/\d(?=\d{3})/g,"$&."));
        }
    });
}

window.spinnerON = function(){
    return $("#overlay").show();
},
window.spinnerOFF = function(){
    return $("#overlay").hide();
}

