<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Objetivo
<p>Esta interface foi desenvolvida para teste e validação de uma integração com Gateway de pagamentos.</p>

# Passos
<li> Execute </li> 
  
  ```
   
    php artisan migrate:fresh --seed 
  
  ```
  <p>O comando acima irá criar as tabelas bases e as informações para teste. (Migrations e Seeders). A base de dados e suas informações de teste foram fornecidas por E-Completo, após serem geradas via 4DEV. </p>
  <p>Para testes, deve-se preecher a variável referente a api key do gateway no .ENV. Neste projeto em específico, o objetivo foi "testar" a integração com o PagCompleto, sendo assim a variável é API_KEY_PAGCOMPLETO. 
    
# Demo
   [![Demo](https://img.youtube.com/vi/qhl2vMbHxQ4/0.jpg)](https://www.youtube.com/watch?v=qhl2vMbHxQ4 "Demo")
