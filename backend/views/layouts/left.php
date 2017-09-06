
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
             
                <img src="<?=Yii::getAlias("@web")."/".htmlentities($mod) ?>" class="img-circle" alt="User Image"/>
                
            </div>
            <div class="pull-left info">
                <p><?=   Yii::$app->user->identity->username  ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
              S
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                 
                    
                    
                    ['label'=>'Cambiar Foto de perfl','icon'=>'image','url'=>['/fotoperfil/12']],                    
                    ['label' => 'Publicaciones', 'icon' => 'upload', 'url' => ['/publicacion']],
                    ['label' => 'Operaciones', 'icon' => 'random', 'url' => ['/operacion']],
                    ['label' => 'Tipos', 'icon' => 'institution', 'url' => ['/tipos']],
//                    ['label' => 'Colonias', 'icon' => 'map-marker', 'url' => ['/colonias']],
                    ['label' => 'Acerca', 'icon' => 'question-circle', 'url' => ['/acerca/1']],
                    ['label' => 'Publicidad', 'icon' => 'sticky-note', 'url' => ['/publicidad']],
                    
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Ubicación',
                        'icon' => 'map-marker',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Estados', 'icon' => 'circle-o', 'url' => ['/estado'],],
                            ['label' => 'Municipios', 'icon' => 'circle-o', 'url' => ['/municipio'],],
                             ['label' => 'Colonias', 'icon' => 'circle-o', 'url' => ['/colonias'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
