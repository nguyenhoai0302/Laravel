{{-- <form method="POST" action="/unicode">
     <div>
        <input type="text" name="username" placeholder="Nhập username..." />
        <input type="hidden" name="_method" value="GET" />
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
     </div>
     <button type="submit">Submit</button>
</form> --}}

<form action="/post" method="POST">
   @csrf

   <p>Username</p>
   <div>
       <input type="text" name="username">
   </div>
   
   <p>Password</p>
   <div>
       <input type="password" name="password">
   </div>

   <br>

   <div>
       <button type="submit">Login</button>
   </div>
</form>
