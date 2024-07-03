
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