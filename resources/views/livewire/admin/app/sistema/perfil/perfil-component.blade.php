<div>

  <div wire:ignore.self class="modal fade" id="modalPasswordReset" data-bs-backdrop="static" data-bs-keyboard="false"
      tabindex="-1" aria-labelledby="modalPasswordResetLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modalPasswordResetLabel">Resetar Senha</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click.prevent="close()"></button>
              </div>
              <div>

                  <div class="row m-3">
                      <div class="col-md-12">
                          <div class="mb-3">
                              <label class="form-label">Nome</label>
                              <input class="form-control" placeholder="nome" wire:model.prevent="data.nome"readonly="readonly" disabled >
                              @error('data.nome')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input class="form-control" placeholder="your-email@domain.com" wire:model.prevent="data.email" readonly="readonly" disabled>
                              @error('data.email')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>
                      </div>
                      <form>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                <i class="fa fa-thumbs-o-up"></i>
                                {{ session('message') }}
                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                <i class="fa fa-warning"></i>
                                {!! session('error') !!}
                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input class="form-control" type="password" name="login[password]" required=""
                                placeholder="*********" wire:model.defer="form.password">
                            @error('form.password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmar Senha</label>
                            <input class="form-control" type="password" name="login[password]" required=""
                                placeholder="*********" wire:model.defer="form.password_confirmation">
                            @error('form.password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-footer">
                            <button class="btn btn-warning btn-block" wire:click.prevent="password()">Atualizar
                                Senha</button>
                        </div>
                    </form>
                  </div>

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click.prevent="close()">Fechar</button>
              </div>
          </div>
      </div>
  </div>

</div>
