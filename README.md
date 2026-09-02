# A&E Casa Nova (Flight CSN-2026) ✈️

Este é o sistema desenvolvido para a comemoração de "Casa Nova" de Arthur & Eduarda. O projeto funciona como um convite interativo no formato de passagem aérea, permitindo confirmação de presença (Check-in) e a venda/reserva de rifas (Bagagem).

## 🛠️ Stack Tecnológica
- **Backend:** Laravel 11.x
- **Frontend:** Livewire 3 + Alpine.js
- **Estilização:** Tailwind CSS (via Vite)
- **Banco de Dados:** MySQL / PostgreSQL (suportado pelo Eloquent)

## 🗂️ Estrutura e Funcionalidades Principais

### 1. Landing Page (O Bilhete Aéreo)
- **Rota:** `/` (View: `welcome.blade.php`)
- Interface estilizada com Tailwind CSS reproduzindo um cartão de embarque temático.

### 2. Check-in (RSVP)
- **Componente:** `App\Livewire\RsvpForm`
- **Model:** `Guest`
- Permite aos convidados confirmarem presença.
- **Campos salvos:** Nome, WhatsApp, E-mail, Quantidade de Acompanhantes e Status de confirmação.

### 3. Bagagem (Sistema de Rifa)
- **Componente:** `App\Livewire\RaffleGrid`
- **Model:** `RaffleTicket`
- Exibe uma grade interativa de números (simulando assentos do voo).
- Usuários podem selecionar um "assento" disponível e preencher os dados para reservá-lo.
- **Status da Rifa:** Pode ser `reserved` (Aguardando PIX) ou `paid` (Pagamento confirmado).

### 4. Torre de Controle (Painel Admin)
- **Rota:** `/admin-voo`
- **Componente:** `App\Livewire\AdminPanel`
- **Autenticação:** Protegido por um input de senha simples no próprio Livewire (Senha padrão atual: `admin123`).
- **Recursos do Painel:**
  - **Métrica:** Exibe o total de pessoas confirmadas (Somatório de Convidados + Seus Acompanhantes).
  - **Lista de Presença:** Tabela com todos os convidados que fizeram check-in.
  - **Gestão da Rifa:** Lista as reservas e permite que o Administrador clique no botão "Confirmar PIX", alterando o status da reserva do banco de dados de `reserved` para `paid` (mudando a cor da tag em tempo real).

---

## 🚀 Guia de Deploy para o Desenvolvedor (Produção)

Siga os passos abaixo para colocar a aplicação no ar em um servidor de produção (como Forge, Vapor ou VPS tradicional).

### 1. Requisitos do Servidor
- PHP >= 8.2
- Composer
- Node.js & NPM (para compilação de assets via Vite)
- Banco de Dados configurado

### 2. Instalação e Configuração

Clone o repositório e instale as dependências do PHP:
```bash
composer install --optimize-autoloader --no-dev
```

Copie o `.env` e gere a chave:
```bash
cp .env.example .env
php artisan key:generate
```

Configure as credenciais do banco de dados no `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 3. Migrations
Rode as migrations para criar as tabelas `guests` e `raffle_tickets`:
```bash
php artisan migrate --force
```

### 4. Compilação de Assets (CSS/JS)
O projeto usa Tailwind e Vite. É **crucial** rodar o build para que as classes CSS (especialmente as fontes grandes do bilhete, como `text-7xl`) sejam injetadas no arquivo final:
```bash
npm install
npm run build
```

### 5. Otimização do Laravel
Rode os comandos de cache para maximizar a performance:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 6. ⚠️ Ponto de Atenção: Senha do Admin
Atualmente, a senha da rota `/admin-voo` está *hardcoded* (fixa) no arquivo `app/Livewire/AdminPanel.php` como `'admin123'` por simplicidade (já que não há um sistema de usuários completo).
**Recomendação para Produção:** 
Altere a lógica no método `authenticate()` do arquivo `AdminPanel.php` para puxar a senha do `.env` (ex: `env('ADMIN_PASSWORD')`) para maior segurança.

```php
// app/Livewire/AdminPanel.php - Linha recomendada de alteração:
if ($this->password === env('ADMIN_PASSWORD', 'sua-senha-segura')) {
```

### 7. Permissões de Pasta
Certifique-se de que as pastas `storage` e `bootstrap/cache` têm permissão de escrita pelo servidor web (ex: `www-data` ou `nginx`):
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

Pronto! O sistema estará operando e pronto para receber os passageiros. 🛫
