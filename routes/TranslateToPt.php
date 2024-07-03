<?php

namespace Routes;

trait TranslateToPt {

    public static function get() {
        return [
            'admin' => 'admin',
            'site' => 'site',
            // pages
            'inicio' => 'home',  
            'sobre' => 'about', 
            'ajuda' => 'help', 
            'contacto' => 'contact', 
            'local' => 'local',
            'noticia' => 'notice',
            'projecto' => 'project',
            'perfil' => 'profile',
    
            // default pages
            'utilizador' => 'user',
            'banner' => 'banner',
            'imagem' => 'image',
            'foto' => 'photo',
            'nova-imagem' => 'createImage',
            'novo-arquivo' => 'createArquive',
            'carregar' => 'upload',
            'baixar' => 'download',
            'documento' => 'document',
            'rascunho' => 'draft',
            'lixeira' => 'trash',
    
            // verbs
            'entrar' => 'login',
            'ir' => 'go',
            'sair' => 'out',
            'tipo' => 'type',
            'senha' => 'password',
            'categoria' => 'category',
            'comeco' => 'index',
            'todos' => 'all',
            'mostrar' => 'show',
            'novo' => 'create',
            'passo-1' => 'stepOne',
            'passo-2' => 'stepTwo',
            'salvar' => 'store',
            'editar' => 'edit',
            'actualizar' => 'update',
            'restaurar' => 'restor',
            'activar' => 'toactive',
    
            'eliminar' => 'delete',
            'destruir' => 'destroy',
            'pesquisar' => 'search',
        ];
    }
}
