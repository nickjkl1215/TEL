<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           <a href="{{ __('clientes/novo') }}">Cadastrar novo cliente</a> 
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Lista dos clientes</h1>
                    <br>
                    <table class="table ">
                        <thead>
                          <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Cpf</th>
                            <th scope="col">Rg</th>
                            <th scope="col">Data de Nascimento</th>
                            <th scope="col">Tel</th>
                            <th scope="col">Origem</th>
                            <th scope="col">Data de Cadastro</th>
                            <th scope="col">Responsavel de Cadastro</th>
                            <th scope="col">Atualização de dados </th>
                            <th scope="col">Responsavel de Atualização</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Deletar</th>
                        </thead>
                        <tbody> 
                        @foreach($clientes as $cliente)
                          <tr>
                            <th scope="row">{{$cliente->name}}</th>
                            <td>{{$cliente->cpf}}</td>
                            <td>{{$cliente->rg}}</td>
                            <td>{{$cliente->data_de_nascimento}}</td>
                            <th>{{$cliente->telefone}}</th>
                            <td>{{$cliente->local_nascimento}}</td>
                            <td>{{date('d/m/Y H:i', strtotime($cliente->created_at))}}</td>
                            <td>{{$cliente->created_by}}</td>
                            <th>{{date('d/m/Y H:i', strtotime($cliente->updated_at))}}</th>
                            <td>{{$cliente->updated_by}}</td>
                            <td>
                                <a href="clientes/{{ $cliente->id }}/editar" class="btn btn-info">Editar</a>
                            </td>
                            <td>
                                <form action="clientes/deletar/{{$cliente->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                          </tr>
                            @endforeach   
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

