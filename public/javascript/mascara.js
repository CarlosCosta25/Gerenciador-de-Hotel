
    function mascaraCPF(cpf) {
        let value = cpf.value.replace(/\D/g, '');

        // Limita o tamanho para 11 dígitos
        if (value.length > 11) {
            value = value.slice(0, 11);
        }

        // Adiciona os pontos e traço conforme o usuário digita
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

        // Atualiza o valor do input
        cpf.value = value;
    }
    function mascaraTelefone(input) {
        let value = input.value.replace(/\D/g, ''); // Remove todos os caracteres que não são dígitos

        // Adiciona parênteses para o DDD
        if (value.length > 2) {
            value = `(${value.substring(0, 2)})${value.substring(2)}`;
        }

        // Adiciona o traço após os primeiros 7 dígitos (telefone)
        if (value.length > 10) {
            value = `${value.substring(0, 9)}-${value.substring(9)}`;
        }

        // Limita o tamanho para 15 caracteres
        if (value.length > 15) {
            value = value.slice(0, 14);
        }

        // Atualiza o valor do input
        input.value = value;
    }

    document.addEventListener("DOMContentLoaded", function() {
        const dinheiroInput = document.getElementById('valor');

        dinheiroInput.addEventListener('input', function(e) {
            let valor = e.target.value;

            // Remove qualquer caractere que não seja número ou vírgula
            valor = valor.replace(/\D/g, '');

            // Transforma o valor em formato de moeda
            valor = (valor / 100).toFixed(2) + ''; // Divide por 100 para posicionar as casas decimais
            valor = valor.replace('.', ','); // Substitui o ponto pela vírgula
            valor = valor.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Adiciona os pontos separadores de milhar

            e.target.value = valor;
        });
    });