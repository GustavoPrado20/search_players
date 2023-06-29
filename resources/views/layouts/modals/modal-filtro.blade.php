<!--Modal-Filtro-->
<section>
    <section class="modal fade" id="filtrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <section class="modal-dialog">
            <section class="modal-content">
                <section class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Filtrar Usuárixs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </section>
                <section class="modal-body">
                    <section class="container-fluid">	
                        <form name="filtrar" method="POST" action="filtrar_contatos.php">
                            <section class="form-group">
                                <label for="tipo_usuario">
                                    Tipo de Usuárix
                                </label>
                                <select class="custom-select" name="tipo_usuario" required="required"/>
                                    <option value="" ></option>
                                    <option value="1">Jogadorx de Aluguel</option>
                                    <option value="2">Administradorx de Um Time</option>
                                    <option value="3">Analisadorx de Partidas</option>
                                </select>
                            </section>
                            <section class="form-group">
                                <label for="esporte_usuario">
                                    Esporte
                                </label>
                                <select class="custom-select" name="esporte_usuario" required="required"/>
                                    <option value=""></option>
                                    <option value="1">Futebol</option>
                                    <option value="2">Basquete</option>
                                    <option value="3">Vôlei</option>
                                    <option value="NULL">Indefinido</option>
                                </select>
                            </section>
                            <section class="form-group">
                                <label for="sexo">
                                    Sexo
                                </label>
                                <select class="custom-select" name="sexo" required="required"/>
                                    <option value=""></option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Feminino</option>
                                    <option value="NULL">Indefinido</option>
                                </select>
                            </section>
                    <section class="modal-footer">
                            <input type="submit" name="filtrar" value="Filtrar Usuárixs" style="background-color:#ff3c00;" class="btn btn-danger">
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </section>                
                </section>		
            </section>
        </section>
    </section>
</section>