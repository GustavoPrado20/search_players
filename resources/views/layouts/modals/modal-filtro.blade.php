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
                        <form name="filtrar" method="GET" action="{{route('filtro_contato')}}">
                            @csrf
                            <section class="form-group">
                                <label for="tipo_usuario">
                                    Tipo de Usuárix
                                </label>
                                <select id = "tipo_usuario" class="custom-select" name="tipo_usuario" required="required"/>
                                    <option value="" ></option>
                                    <option value="jogador">Jogadorx de Aluguel</option>
                                    <option value="administrador_time">Administradorx de Um Time</option>
                                    <option value="analisador">Analisadorx de Partidas</option>
                                </select>
                            </section>
                            <section class="form-group">
                                <label for="esporte_usuario">
                                    Esporte
                                </label>
                                <select id = "esporte_usuario" class="custom-select" name="esporte" required="required"/>
                                    <option value=""></option>
                                    <option value="futebol">Futebol</option>
                                    <option value="basquete">Basquete</option>
                                    <option value="volei">Vôlei</option>
                                    <option value="NULL">Indefinido</option>
                                </select>
                            </section>
                            <section class="form-group">
                                <label for="sexo">
                                    Sexo
                                </label>
                                <select id = "sexo" class="custom-select" name="sexo" required="required"/>
                                    <option value=""></option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Feminino</option>
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