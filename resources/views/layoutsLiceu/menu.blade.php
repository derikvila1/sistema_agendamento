<div class="item">
    <a class="ui logo icon image" href="/">
        <img src="/img/secretaria.svg">
    </a>
    <a href="/"><b>cultura.am</b></a>
</div>
<a class="item" href="/dashboard">
    <b>Início</b>
</a>
<div class="item">
    <div class="header">Cadastro Estadual de Cultura</div>
    <div class="menu">
        <a class="item" href="{{'//cadastroestadual'.env('SESSION_DOMAIN').'/profile' }}">
            Meu cadastro
        </a>
        <a class="item" href="{{'//cadastroestadual'.env('SESSION_DOMAIN').'/update' }}">
            Atualizar cadastro
        </a>
        <a class="item" href="{{'//cadastroestadual'.env('SESSION_DOMAIN').'/statements' }}">
            Declarações
        </a>
        <a class="item" href="{{'//cadastroestadual'.env('SESSION_DOMAIN').'/registrations' }}">
            Cadastros
        </a>
        <a class="item" href="{{'//cadastroestadual'.env('SESSION_DOMAIN').'/report' }}">
            Relatório
        </a>
    </div>
</div>
<div class="item">
    <div class="header">Editais da Cultura</div>
    <div class="menu">
        <a class="item" href="{{'//editais'.env('SESSION_DOMAIN').'/new' }}">
            Novo edital
        </a>
        <a class="item" href="{{'//editais'.env('SESSION_DOMAIN').'/contests' }}">
            Editais
        </a>
        <a class="item" href="{{'//editais'.env('SESSION_DOMAIN').'/standards' }}">
            Portarias
        </a>
        <a class="item" href="{{'//editais'.env('SESSION_DOMAIN').'/laws' }}">
            Legislações
        </a>
        <a class="item" href="{{'//editais'.env('SESSION_DOMAIN').'/exemptions' }}">
            Dispensas/Inexigibilidade de chamamento
        </a>
        <a class="item" href="{{'//editais'.env('SESSION_DOMAIN').'/entries' }}">
            Minhas inscrições
        </a>
    </div>
</div>
<div class="item">
    <div class="header">Eventos</div>
    <div class="menu">
        <a class="item" href="{{'//eventos'.env('SESSION_DOMAIN').'/new' }}">
            Novo evento
        </a>
        <a class="item" href="{{'//eventos'.env('SESSION_DOMAIN').'/events' }}">
            Lista de eventos
        </a>
        <a class="item" href="{{'//eventos'.env('SESSION_DOMAIN').'/places' }}">
            Locais
        </a>
        <a class="item" href="{{'//eventos'.env('SESSION_DOMAIN').'/schedule' }}">
            Calendário
        </a>
    </div>
</div>
<div class="item">
    <div class="header">Visitações</div>
    <div class="menu">
        <a class="item" href="{{'//eventos'.env('SESSION_DOMAIN').'/visit/new' }}">
            Cadastrar horário
        </a>
        <a class="item" href="{{'//eventos'.env('SESSION_DOMAIN').'/visit/places' }}">
            Locais
        </a>
        <a class="item" href="{{'//eventos'.env('SESSION_DOMAIN').'/visit/schedule' }}">
            Calendário
        </a>
    </div>
</div>
<div class="item">
    <div class=" header">Administração</div>
    <div class="menu">
        <a class="item" href="{{'//sso'.env('SESSION_DOMAIN').'/permissions' }}">
            Permissões
        </a>
        <a class="item" href="{{'//sso'.env('SESSION_DOMAIN').'/users' }}">
            Usuários
        </a>
    </div>
</div>
<div class="item">
    <div class=" header">Conta</div>
    <div class="menu">
        <a class="item" href="{{'//sso'.env('SESSION_DOMAIN').'/email' }}">
            Alterar e-mail
        </a>
        <a class="item" href="{{'//sso'.env('SESSION_DOMAIN').'/password' }}">
            Alterar senha
        </a>
        <a class="item" onclick="document.getElementById('logout').submit()">
            Sair
        </a>
    </div>
</div>