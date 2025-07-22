const InputCPF = document.getElementById('cpf');
const InputRG = document.getElementById('rg');
const InputPHONE = document.getElementById('phone');
InputCPF.addEventListener('input', (event) => {
    event.target.value = MaskCPF(event.target.value);
});

InputRG.addEventListener('input', (event) => {
    event.target.value = MaskRG(event.target.value);
});
InputPHONE.addEventListener('input', (event) => {
    event.target.value = MaskPHONE(event.target.value);
});

function MaskCPF(value) {
    value = value.replace(/\D/g, '');               // Remove tudo que não é dígito
    value = value.replace(/(\d{3})(\d)/, '$1.$2');  // Ponto depois do 3º dígito
    value = value.replace(/(\d{3})(\d)/, '$1.$2');  // Ponto depois do 6º dígito
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Hífen antes dos últimos 2 dígitos
    return value;
}

function MaskRG(value) {
    // Remove tudo que não for dígito ou letra maiúscula
    value = value.toUpperCase(); // opcional para garantir letra maiúscula
    value = value.replace(/[^0-9X]/g, ''); // aceita dígitos e X

    // Aplica a máscara considerando que a última posição pode ser letra ou dígito
    if (value.length > 2)
        value = value.replace(/(\d{2})(\d)/, '$1.$2');
    if (value.length > 5)
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
    if (value.length > 8)
        value = value.replace(/(\d{3})([0-9X])$/, '$1-$2');

    return value;
}

function MaskPHONE(value) {
    value = value.replace(/\D/g, '');                 // Remove tudo que não for dígito
    value = value.replace(/^(\d{2})(\d)/, '($1) $2'); // Coloca parênteses no DDD e espaço
    value = value.replace(/(\d{5})(\d)/, '$1-$2');    // Coloca hífen após os 5 primeiros dígitos do número
    return value;
}
