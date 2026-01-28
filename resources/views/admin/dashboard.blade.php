<h1>Dashboard Admin</h1>
<p>Login sebagai admin berhasil</p>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Logout</button>
</form>
