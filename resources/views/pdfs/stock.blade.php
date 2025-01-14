<x-layouts.pdf title="Stock de Insumos" :image="$image">

<style>
  .table {
    color: black;
    text-align: center;
    border: 1px solid #aaa;
  }

  .table thead th {
    font-weight: bold;
    background-color: #5f76e8;
    border: 1px solid #5f76e8;
    color: white;
  }
  
  .table td, table.table th {
    padding: 0.25rem;
    border-right: 1px solid #aaa;
  }

  .table tr {
    border-bottom: 1px solid #aaa;
  }
</style>

<x-stock-table :products="$products" :actions="false" />

</x-layouts.pdf>
