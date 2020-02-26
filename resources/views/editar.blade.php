<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <form action="perfil_edit" method="post">
          @csrf

          @method($method)

          <div>
              <label>Nombre</label>
              <input
                  type="text" name="first_name"
                  value="{{ old('first_name', $user->first_name) }}"> <br>
                 </div>
                 <div>
                     <label>Apellido</label>
                     <input
                         type="text" name="last_name"
                         value="{{ old('last_name', $user->last_name) }}"> <br>
                        </div>
                        <div>
                            <label>DNI</label>
                            <input
                                type="text" name="identification_number"
                                value="{{ old('identification_number', $user->identification_number) }}"> <br>
                               </div>
                               <div>
                                   <label>Email</label>
                                   <input
                                       type="email" name="email"
                                       value="{{ old('email', $user->email) }}"> <br>
                                      </div>
                 <button type="submit">Enviar</button>
      </form>
    </div>
  </div>
</div>
