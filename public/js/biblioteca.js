var options = {
    onKeyPress: function (cpf, ev, el, op) {
        var masks = ['000.000.000-00'];
        $('.cpfOuCnpj').mask( masks[0]);
    }
}

 $('.cpfOuCnpj').mask('000.000.000-00');


function deleteRegistroPaginacao(rotaUrl, idRegistro){
    if (confirm('Deseja realmente excluir?')){
        $.ajax({
            url: rotaUrl,
            method: 'DELETE',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                id: idRegistro,
            },
            beforeSend: function(){
                $.blockUI({
                    message: 'Carregando...',
                    timeout: 3000,
                });
            },
        }).done(function (data){
            $.unblockUI();
            if(data.success == true){
                window.location.reload();
            }else{
                alert('Não foi possivel excluir');
            }
            console.log(data);
        }).fail(function(data){
            $.unblockUI();
            alert('Não foi possivel buscar os dados');
        });
    }
}
