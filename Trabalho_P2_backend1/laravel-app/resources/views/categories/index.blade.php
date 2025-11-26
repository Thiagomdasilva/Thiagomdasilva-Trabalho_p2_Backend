<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>

    <!-- Fonte moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        /* ======= RESET ======= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ======= Tema moderno (Glass + Neon) ======= */
        :root {
            --bg: #0e0f12;
            --glass: rgba(255, 255, 255, 0.06);
            --border: rgba(255, 255, 255, 0.15);

            --primary: #6a8bff;
            --primary-hover: #5376ff;

            --warning: #f5d142;
            --danger: #ff4f4f;
            --danger-hover: #e04444;

            --radius: 14px;
        }

        body {
            background: var(--bg);
            font-family: "Poppins", sans-serif;
            color: #fff;

            /* Fundo neon suave */
            background: radial-gradient(circle at top right, #242b40 0%, #0e0f12 60%);
            min-height: 100vh;

            padding-top: 3rem;

            display: flex;
            justify-content: center;
        }

        /* ======= CARD GLASS ======= */
        .main-card {
            width: 900px;
            max-width: 95%;
            padding: 2rem 2.5rem;

            background: var(--glass);
            border: 1px solid var(--border);
            backdrop-filter: blur(16px);

            border-radius: var(--radius);

            box-shadow: 0 0 25px rgba(0,0,0,0.45);

            animation: fadeIn .5s ease;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            color: #fff;
        }

        /* ======= STATUS BAR ======= */
        .status {
            padding: .9rem 1rem;
            border-radius: var(--radius);

            background: rgba(46, 204, 113, 0.15);
            border-left: 6px solid #2ecc71;

            font-weight: 600;
            margin-bottom: 1.3rem;

            animation: fadeIn .3s ease;
        }

        /* ======= Botões ======= */
        .button {
            padding: .6rem 1.1rem;
            border-radius: var(--radius);
            color: #fff;
            font-weight: 600;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: .25s;
        }

        .button-primary {
            background: var(--primary);
        }
        .button-primary:hover {
            transform: translateY(-2px);
            background: var(--primary-hover);
            box-shadow: 0 0 12px #7594ff;
        }

        .button-edit {
            background: var(--warning);
            color: #4d3d00;
        }

        .button-delete {
            background: var(--danger);
        }
        .button-delete:hover {
            background: var(--danger-hover);
            transform: scale(1.05);
        }

        /* ======= TABELA ======= */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: .5rem;
        }

        thead th {
            padding: 14px 10px;
            color: #b8bcd1;
            font-weight: 700;
            text-transform: uppercase;
            font-size: .82rem;
            letter-spacing: 1px;

            border-bottom: 1px solid rgba(255,255,255,0.1);
            background: rgba(255,255,255,0.03);
        }

        tbody td {
            padding: 14px 10px;
            font-size: .95rem;
            color: #f0f0f0;

            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        tbody tr {
            transition: .2s ease;
        }

        tbody tr:hover {
            background: rgba(255,255,255,0.05);
            transform: scale(1.002);
        }

        .actions {
            display: flex;
            gap: 0.4rem;
        }

        /* ======= Paginação ======= */
        .pagination {
            margin-top: 1.4rem;
            text-align: center;
        }

        /* ======= Animação ======= */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(7px); }
            to { opacity: 1; transform: translateY(0); }
        }

    </style>

</head>

<body>

<div class="main-card">

    <div class="header">
        <h1>📁 Categorias</h1>

        <a class="button button-primary" href="{{ route('categories.create') }}">
            ➕ Nova Categoria
        </a>
    </div>

    @if (session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Criada em</th>
            <th>Ações</th>
        </tr>
        </thead>

        <tbody>
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->created_at?->format('d/m/Y H:i') }}</td>

                <td class="actions">
                    <a class="button button-edit" href="{{ route('categories.edit', $category) }}">
                        ✏️ Editar
                    </a>

                    <form action="{{ route('categories.destroy', $category) }}"
                          method="POST"
                          onsubmit="return confirm('Excluir esta categoria?');">

                        @csrf
                        @method('DELETE')

                        <button class="button button-delete" type="submit">
                            🗑️ Excluir
                        </button>
                    </form>
                </td>
            </tr>

        @empty
            <tr>
                <td colspan="5" style="text-align:center; padding: 1.2rem;">
                    Nenhuma categoria cadastrada.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $categories->links() }}
    </div>

</div>

</body>
</html>
