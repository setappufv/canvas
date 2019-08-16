<p align="center">
    <br>
    <img src="https://raw.githubusercontent.com/cnvs/art/master/github-header.png" width="400">
</p>

<p align="center">
	<a href="https://packagist.org/packages/setappufv/canvas"><img src="https://poser.pugx.org/setappufv/canvas/downloads"></a>
	<a href="https://packagist.org/packages/setappufv/canvas"><img src="https://poser.pugx.org/setappufv/canvas/v/stable"></a>
	<a href="https://packagist.org/packages/setappufv/canvas"><img src="https://poser.pugx.org/setappufv/canvas/license"></a>
    <br>
</p>

## Introdução

Uma plataforma de publicação do [Laravel](https://laravel.com). O CanvasBr é um pacote de software totalmente aberto para estender seu aplicativo e colocá-lo em funcionamento com um blog em apenas alguns minutos. Além de uma experiência de escrita livre de distrações, você pode visualizar tendências mensais em seu conteúdo, obter insights sobre o tráfego de leitores e muito mais!

## Instalação

> **Nota:** O CanvasBr requer que você tenha autenticação de usuário antes da instalação. Você pode executar o comando `make: auth` Artisan para satisfazer este requisito.

Você pode usar o [Composer](https://getcomposer.org/) para instalar o CanvasBr no seu projeto do Laravel:

```bash
composer require setappufv/canvas
```

Publique os assets e o arquivo de configuração principal usando o comando `canvas: install` Artisan:

```bash
php artisan canvas:install
```

Crie um link simbólico para garantir que os uploads de arquivos sejam acessíveis publicamente na Web usando o comando `storage: link` Artisan:

```bash
php artisan storage:link
```

## Configuração

<<<<<<< HEAD
> **Nota:** Você não é obrigado a concluir as etapas a seguir. Você tem total liberdade de design ao integrar o conteúdo do blog em seu aplicativo.
=======
**Want to get started fast?** Just run `php artisan canvas:setup` after installing Canvas. A `--data` option may also be included in the command to generate demo data. Then, navigate your browser to `http://your-app.test/blog` or any other URL that is assigned to your application. This command scaffolds a default frontend for your entire blog!
>>>>>>> upstream/master

Gere um controlador de blog padrão com rotas e visualizações para começar a funcionar o mais rápido possível:

```bash
php artisan canvas:setup
```
Se você quiser incluir imagens do [Unsplash] (https://unsplash.com) em suas postagens, configure um novo aplicativo em [https://unsplash.com/oauth/applications](https://unsplash.com/oauth/aplicativos). Pegue sua chave de acesso e atualize `config/canvas.php`:

```php
'unsplash' => [
    'access_key' => env('CANVAS_UNSPLASH_ACCESS_KEY'),
],
```

**Quer um resumo semanal?** O Canvas fornece suporte para um e-mail semanal que fornece estatísticas rápidas do conteúdo que você criou, entregues diretamente na sua caixa de entrada. Depois que seu aplicativo estiver [configurado para enviar e-mails](https://laravel.com/docs/5.8/mail), atualize `config/canvas.php`:

```php
'mail' => [
    'enabled' => env('CANVAS_MAIL_ENABLED', false),
],
```

Como o resumo semanal é executado no [Laravel's Scheduler](https://laravel.com/docs/5.8/scheduling#introduction), você precisará adicionar a seguinte entrada cron ao seu servidor:

```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Atualizações
Você pode atualizar sua instalação do Canvas usando o composer:

```bash
composer update
```

Execute qualquer nova migração usando o comando `migrate` Artisan:

```bash
php artisan migrate
```

Publique novamente os assets usando o comando `canvas: publish` Artisan:

```bash
php artisan canvas:publish
```

## Testando

Execute os testes com:

```bash
composer test
```

## Futuras Modificações

> **Esta é uma lista de futuras POSSÍVEIS modificações, nem todas serão implementadas**

<ul>
    <li> Suporte Multi-Linguagem </li>
    <li> Criar API para acesso aos POST's </li>
    <li> Agrupar POST's por AUTOR </li>
    <li> Upload de Imagem do AUTOR com CROP </li>
    <li> Slug Automatico de acordo com o Titulo </li>
    <li> Adicionar Comentários </li>
    <li> Compartilhar POST's -> Face e Twitter </li>
    <li> Login com Multiplos Niveis:
        <ul>
            <li>Administrador -> Cria novos Colaboradores </li>
            <li> Colaborador -> Criar Posts, Topicos, Tags e visualizar stats </li>
            <li> Usuario Premium -> Tem acesso a posts premiuns </li>
            <li> Usuario Free -> Pode comentar </li>
            <li> Não Cadastrado -> Visualiza os post </li>
        </ul>
    </li>
    <li> Inscrição de Email </li>
    <li> Enviar Automatico de Email quando houver conteudo novo </li>
</ul>

## Licensa
O Canvas é um software de código aberto licenciado sob a [MIT license](https://opensource.org/licenses/MIT).

## Créditos

- [The team](https://github.com/orgs/cnvs/people) that continues to support and develop this project
- Thanks to [Mohamed Said](https://themsaid.com/) and his project [Wink](https://github.com/writingink/wink) for inspring much of the design
- Anyone who has [contributed a patch](https://github.com/cnvs/canvas/pulls) or [made a helpful suggestion](https://github.com/cnvs/canvas/issues)
