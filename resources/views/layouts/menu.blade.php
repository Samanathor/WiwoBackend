<li class="nav-item {{ Request::is('categorias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('categorias.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Categorias</span>
    </a>
</li>
<li class="nav-item {{ Request::is('subcategorias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('subcategorias.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Subcategorias</span>
    </a>
</li>
<li class="nav-item {{ Request::is('ciudades*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('ciudades.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Ciudades</span>
    </a>
</li>
<li class="nav-item {{ Request::is('referencias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('referencias.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Referencias</span>
    </a>
</li>
<li class="nav-item {{ Request::is('experiencias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('experiencias.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Experiencias</span>
    </a>
</li>
<li class="nav-item {{ Request::is('empresas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('empresas.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Empresas</span>
    </a>
</li>


<li class="nav-item {{ Request::is('configuraciones*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('configuraciones.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Configuraciones</span>
    </a>
</li>
<li class="nav-item {{ Request::is('favoritos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('favoritos.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Favoritos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('denuncias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('denuncias.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Denuncias</span>
    </a>
</li>
<li class="nav-item {{ Request::is('planes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('planes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Planes</span>
    </a>
</li>
<li class="nav-item {{ Request::is('planesUsuario*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('planesUsuario.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Planes Usuario</span>
    </a>
</li>
<li class="nav-item {{ Request::is('pagos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('pagos.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Pagos</span>
    </a>
</li>
<li class="nav-item {{ Request::is('vacantes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('vacantes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Vacantes</span>
    </a>
</li>
<li class="nav-item {{ Request::is('postulaciones*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('postulaciones.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Postulaciones</span>
    </a>
</li>
<li class="nav-item {{ Request::is('mensajes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('mensajes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Mensajes</span>
    </a>
</li>
<li class="nav-item {{ Request::is('estudios*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('estudios.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Estudios</span>
    </a>
</li>
<li class="nav-item {{ Request::is('perfiles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('perfiles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Perfiles</span>
    </a>
</li>
