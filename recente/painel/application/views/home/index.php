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
            </div>
        </div>