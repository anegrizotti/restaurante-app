$(document).ready(function () {
    function groupBy(arr, property) {
        return arr.reduce(function (anterior, atual) {
            if (!anterior[atual[property]]) {
                anterior[atual[property]] = [];
            }
            anterior[atual[property]].push(atual);
            return anterior;
        }, []);
    }

    const selectFiltroTipo = $("#id-div-filtra-tipos");
    selectFiltroTipo.on("change", function () {
        filtraProdutoPorTipo(selectFiltroTipo.val());
    });

    function showUpdatedPedidos(pedidos_group) {
        divListPedidos = $("#listagem-pedidos");

        divListPedidos.html("");
        pedidos_group.forEach(pedidos_tipo => {
            if (pedidos_tipo[0].status == 'A') {
                divListPedidos.append(`
                    <div value="${pedidos_tipo[0].id}" class="list-group-item list-group-item-action list-group-item-secondary">
                        Pedido ${pedidos_tipo[0].id}
                    </div>
                `);
            }
            else if (pedidos_tipo[0].status == 'R') {
                divListPedidos.append(`
                    <div value="${pedidos_tipo[0].id}" class="list-group-item list-group-item-action list-group-item-warning">
                        Pedido ${pedidos_tipo[0].id}
                    </div>
                `);
            }
            else if (pedidos_tipo[0].status == 'C') {
                divListPedidos.append(`
                    <div value="${pedidos_tipo[0].id}" class="list-group-item list-group-item-action list-group-item-danger">
                        Pedido ${pedidos_tipo[0].id}
                    </div>
                `);
            }
            else if (pedidos_tipo[0].status == 'E') {
                divListPedidos.append(`
                    <div value="${pedidos_tipo[0].id}" class="list-group-item list-group-item-action list-group-item-primary">
                        Pedido ${pedidos_tipo[0].id}
                    </div>
                `);
            }
            else if (pedidos_tipo[0].status == 'F') {
                divListPedidos.append(`
                    <div value="${pedidos_tipo[0].id}" class="list-group-item list-group-item-action">
                        Pedido ${pedidos_tipo[0].id}
                    </div>
                `);
            }
        });
    }

    function filtraProdutoPorTipo(tipoSelecionado) {
        const tipoProdutoId = tipoSelecionado;
        $.ajax({
            type: "GET",
            url: `/pedido/admin/getprodutos/${tipoProdutoId}`,
            data: null,
            dataType: "json",
            success: function(response){
                printSelectProdutos(response.return);
            },
            error: function(error){
                console.log("Erro");
                console.log(error);
            }
        });
    }
    
    function printSelectProdutos(produtos_group) {
        console.log(produtos_group);

        divListProdutos = $("#id-div-filtra-produto-por-tipo");

        console.log(divListProdutos);
        divListProdutos.html("");
        produtos_group.forEach(produtos => {
            divListProdutos.append(`
                            <option value="${produtos.id}">${produtos.nome}</option>
            `);
        });

    }

    function updatePedidos() {
        $.ajax({
            type: "GET",
            url: `/pedido/admin/getpedidos/`,
            data: null,
            dataType: "json",
            success: function (response) {
                pedidos_group = groupBy(response.return, "id");
                showUpdatedPedidos(pedidos_group);

                  $(".list-group-item").on("click", function(){
                    console.log(this.getAttribute("value"));
                      updatePedidoProdutos(this.getAttribute("value"));
                  });
            },
            error: function (error) {
                console.log("Erro");
                console.log(error);
            }
        });
    }


    function updateTipoProdutosDropDown() {
        $.ajax({
            type: "GET",
            url: `/pedido/admin/gettipoprodutos/`,
            data: null,
            dataType: "json",
            success: function (response) {
                printSelectTipoProdutos(response.return);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }

    function printSelectTipoProdutos(produtos_group) {
        divListProdutos = $("#id-div-filtra-tipos");

        console.log(divListProdutos);
        divListProdutos.html("");
        produtos_group.forEach(produtos_tipo => {
            divListProdutos.append(`
                            <option value="${produtos_tipo.id}">${produtos_tipo.descricao}</option>
            `);
        });
    }

     function updatePedidoProdutos(idPedido){
         $.ajax({
             type: "GET",
             url: `/pedido/admin/getpedidoprodutos/${idPedido}`,
             data: null,
             dataType: "json",
             success: function(response){
                 printListPedidoProdutos(response.return);

                 $(".text-center").html(`Pedido ${idPedido}`);
             },
             error: function(error){
                 console.log(error);
             }
         });
     }

     function printListPedidoProdutos(produtos_group){
        console.log(produtos_group);

        divListProdutos = $("#id-div-filtra-produto-por-pedido");

        console.log(divListProdutos);
        divListProdutos.html("");
        produtos_group.forEach(produtos => {
            divListProdutos.append(`
                    <span class="list-group-item">
                    ${produtos.descricao} -  ${produtos.nome} -  ${produtos.quantidade}x
                        <span class="class-icons-produto-list">
                            <i class="fa-solid fa-pencil-square"></i>
                            <i class="fa-solid fa-trash"></i>
                        </span>
                    </span>
            `);
        });
       
    }

    updateTipoProdutosDropDown();
    updatePedidos();

});
