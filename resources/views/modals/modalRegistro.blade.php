@extends('modals.esqueleto.esqueletoModal')

@section('conteudo-modal')
    <main>
        <!--Modal-Cadastro_Completo-->
        <section>
            <div class="modal fade" id="cadastro_completo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastradx com sucesso!</h5>
                        </div>							     
                        <div class="modal-footer">
                            <a href="home.php">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#completa">OK</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>						
        </section>

        <!--Modal-Email_em_Uso-->
        <section>
            <div class="modal fade" id="email_em_uso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Este email já está em uso</h5>
                        </div>
                        <div class="modal-footer">
                            <a href="deslogar.php">
                                <button type="button" class="btn btn-secondary">OK</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>						
        </section>

        <!--Modal-Falha_ao_Cadastrar-->
        <section>
            <div class="modal fade" id="falha_ao_cadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Houve uma falha ao Cadastrar</h5>
                        </div>
                        <div class="modal-footer">
                            <a href="deslogar.php">
                                <button type="button" class="btn btn-secondary">OK</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>						
        </section>
    </main>
@endsection