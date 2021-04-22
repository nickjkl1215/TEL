<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <a href="{{url('clientes')}}">Voltar</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if( Request::is('*/editar'))
                    <form action="{{url('clientes/atualizar')}}/{{ $cliente->id }}" method="post" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Nome</label>
                          <input  name="name" type="text" class="form-control" id="inputEmail4" value="{{$cliente->name}}">
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">CPF</label>
                          <input  name="cpf" type="text" class="form-control" id="inputPassword4" value="{{$cliente->cpf}}">
                        </div>
                        <div class="col-md-6">
                          <label for="inputAddress" class="form-label">RG</label>
                          <input name="rg" type="text" class="form-control" id="inputAddress" value="{{$cliente->rg}}">
                        </div>
                        <div class="col-md-6">
                          <label for="inputAddress2" class="form-label">Data de Nascimento</label>
                          <input name="data_de_nascimento" type="text" class="form-control" id="inputAddress2" value="{{$cliente->data_de_nascimento}}">
                        </div>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label">Telefone</label>
                          <input name="telefone" type="text" class="form-control" id="inputCity" value="{{$cliente->telefone}}">
                        </div>
                        <div class="col-md-4">
                          <label for="inputState" class="form-label">Local de Nascimento</label>
                          
                          <select  name="local_nascimento" id="inputState" class="form-select" value="{{$cliente->local_nascimento}}">
                            <option selected>Cidade...</option>
                            <option>Bahia</option>
                            <option>São Paulo</option>
                          </select>
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Atualizar</button>
                        </div>
                      </form>
      
                      @else
                          
                    <form action="{{url('clientes/adicionar')}}" method="post" class="row g-3">
                        @csrf
                        <div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Nome</label>
                          <input maxlength="25" name="name" type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                          <label for="inputPassword4" class="form-label">CPF</label>
                          <input maxlength="14" name="cpf" type="text" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-6">
                          <label for="inputAddress" class="form-label">RG</label>
                          <input maxlength="12" name="rg" type="text" class="form-control" id="inputAddress">
                          @error('rg')
                          <p>O rg é obrigatorio!</p>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="inputAddress2" class="form-label">Data de Nascimento</label>
                          <input name="data_de_nascimento" min="1900-01-01" max="2021-01-01" type="date" class="form-control" id="inputAddress2" >
                          @error('data_de_nascimento')
                            <p>Deve ser maior de 18 anos</p>
                          @enderror
                        </div>
                        <div class="col-md-6">
                          <label for="inputCity" class="form-label">Telefone</label>
                          <input name="telefone" type="text" class="form-control" id="inputCity">
                        </div>
                      
                        <div class="col-md-4">
                          <label for="inputState" class="form-label">Local de Nascimento</label>
                          <select  name="local_nascimento" id="inputState" class="form-select">
                            <option selected>Cidade...</option>
                            <option>Bahia</option>
                            <option>São Paulo</option>
                          </select>
                        </div>
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </div>
                      </form>
                      @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>