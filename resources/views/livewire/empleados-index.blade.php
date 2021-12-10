<div>
 <div class="card">
     <div class="card-body">
         <table id="table2" class="table table-striped">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Nombre</th>
                     <th>Email</th>
                     <th>Estado Cuenta</th>
                     <th></th>
                 </tr>
             </thead>
             <tbody>
                 
                 @foreach ($users  as $user)
                     <tr>
                         <td>{{$user->id}}</td>
                         <td>{{$user->name}}</td>
                         <td>{{$user->email}}</td>
                         <td> @if ($user->status == 'Activo')
                             <span class="badge badge-success">Activo</span>
                                @else
                                <span class="badge badge-danger">Inactivo</span>
                              @endif 
                        </td>
                         <td width="10px">
                             <a  class="btn btn-primary" href="{{route('empleado.edit', $user)}}">editar</a>
                         </td>
                     </tr>
                 @endforeach
                 
             </tbody>
         </table>
     </div>
 </div>
</div>
