                <ul class="collection menuAdmin">
                    <li class="collection-item">
                        <?php
                            echo anchor('/home_edit', 'Editar Home', 'title="Editar Home"');
                        ?>
                    </li>
                    <li class="collection-item">
                        <?php
                            echo anchor('/perfis', 'Perfis', 'title="Perfis"');
                        ?>
                    </li>
                    <li class="collection-item">
                        <?php
                            echo anchor('/categorias', 'Categorias', 'title="Categorias"');
                        ?>
                    </li>
                    <li class="collection-item">
                        <?php
                            echo anchor('/artigos', 'Artigos', 'title="Artigos"');
                        ?>
                    </li>
                    <li class="collection-item">
                        <?php
                            echo anchor('/tags', 'Tags', 'title="Tags"');
                        ?>
                    </li>
                    <?php if ($this->session->userdata('tipo') < 3) { ?>
                        <li class="collection-item">
                            <?php
                                echo anchor('/usuarios', 'Usuários', 'title="Usuários"');
                            ?>
                        </li>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') < 2) { ?>
                        <li class="collection-item">
                            <?php
                                echo anchor('/usuarios_acessos', 'Usuários Acessos', 'title="Usuários Acessos"');
                            ?>
                        </li>
                    <?php } ?>
                </ul>
                <?php if ($this->session->userdata('tipo') < 3) { ?>
                    <ul class="collection menuAdmin right">
                        <li class="collection-item">
                            <?php
                                echo anchor('/incidentes', 'Ver e Publicar Incidentes', 'title="Ver e Publicar Incidentes"');
                            ?>
                        </li>
                        <li class="collection-item">
                            <?php
                                echo anchor('/incidentes/tipos', 'Editar Tipos de Incidente', 'title="Editar Tipos de Incidente"');
                            ?>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>