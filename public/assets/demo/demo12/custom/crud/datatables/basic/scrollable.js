var DatatablesBasicScrollable={init:function()
    {
        $("#m_table_1").DataTable({
            scrollY:"50vh",
            scrollX:!0,
            scrollCollapse:!0,
            columnDefs:[
                {
                    targets:-1,
                    title:"Actions",
                    orderable:!1,
                }
            ]
        }),
        $("#table-data").DataTable({
            scrollY:"50vh",
            scrollX:!0,
            scrollCollapse:!0,
            columnDefs:[
                {
                    targets:-1,
                    title:"Actions",
                    orderable:!1,
                }
            ]
        }),
        $("#order_table").DataTable({
            scrollY:"50vh",
            scrollX:!0,
            scrollCollapse:!0,
            columnDefs:[
                {
                    targets:-1,
                    title:"Actions",
                    orderable:!1,
                },
                {
                    targets:6,
                    render:function(a,e,t,n){
                        var l={
                            1:{title:"Ordered",class:"m-badge--brand"},
                            2:{title:"Delivered",class:" m-badge--metal"},
                            3:{title:"Shipped",class:" m-badge--primary"},
                            4:{title:"Returned",class:" m-badge--danger"},
                            5:{title:"Canceled",class:" m-badge--warning"}
                        };return void 0===l[a]?a:'<span class="m-badge '+l[a].class+' m-badge--wide">'+l[a].title+"</span>"
                    }
                }
            ]
        })
    }};jQuery(document).ready(function(){DatatablesBasicScrollable.init()});