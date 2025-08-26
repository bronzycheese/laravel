<div>
    <div class="d-flex align-items-center">
        <div class="brand-logo me-3" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalConta">AN</div>
        <div class="brand-text" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalConta">
            <div class="fw-bold text-secondary" style="font-size: 14px;">PREFEITURA</div>
            <small class="text-muted">{{$sessionIdNome ?? 'SELECIONE'}}</small>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modalConta" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalContaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalContaLabel">Selecione uma cidade </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <select class="form-select" aria-label="Default select example" wire:model.live="session">
                        <option selected value="0">Selecione uma cidade</option>
                        @forelse ($cidades as $item )                        
                            <option value="{{$item->id}}">{{$item->nome}}</option>
                        @empty                        
                        @endforelse                    
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</div>