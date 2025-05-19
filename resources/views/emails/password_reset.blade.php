<!DOCTYPE html>
<html>
<head>
    <title>Recuperação de Senha</title>
</head>
<body>
    <p>Olá, {{ $user->name }}.</p>
    <p>Você solicitou a recuperação de senha. Clique no link abaixo para resetar sua senha:</p>
    <p><a href="{{ $resetUrl }}">{{ $resetUrl }}</a></p>
    <p>Se você não solicitou, ignore este email.</p>
</body>
</html>
