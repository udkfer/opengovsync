# Câmara Dados Abertos
Sistema Laravel para consumir a API de Dados Abertos da Câmara dos Deputados.

## Pré-requisitos
- Docker
- Docker Compose
- PHP 8.2
- Composer

## Instalação
1. Clone o repositório: `git clone <URL>`
2. Instale dependências: `composer install`
3. Configure o `.env` com as credenciais do banco.
4. Inicie os containers: `docker-compose up -d`
5. Execute migrations: `docker-compose exec app php artisan migrate`
6. Inicie o worker: `docker-compose exec app php artisan queue:work`

## Uso
- Acesse: `http://localhost:8080/deputados`
- Clique em "Sincronizar Dados" para importar dados da API.
