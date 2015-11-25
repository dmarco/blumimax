        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="top-header bg-Light-grey">
            <div class="container">

              <!-- Right -->
              <ul class="nav navbar-nav navbar-right">
                <li>{{ HTML::link('/admin/categories', 'Categorías') }}</li>
                <li>{{ HTML::link('/admin/products', 'Productos') }}</li>
                <li>{{ HTML::link('/admin/ordenes', 'Ordenes') }}</li>
                <li>{{ HTML::link('/admin/usuarios', 'Usuarios') }}</li>
                <li>{{ HTML::link('/admin/newsletters', 'Subscriptos Newsletter') }}</li>
                <li>{{ HTML::link('/users/signout', 'Cerrar sesión') }}</li>
               </ul>
           </div>
          </div>
        </div>