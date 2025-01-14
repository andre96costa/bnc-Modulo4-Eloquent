<x-app-layout>
    <x-slot name="header">
        <h3>Header</h3>
    </x-slot>
    <ol>
        <li>Nome: {{ $name }}</li>
        <li>Documento: {{ $document }}</li>
        <li>Estatus da assinatura: {{ $status }}</li>
        <li>Bebidas: {{ $params }}</li>
    </ol>
</x-app-layout>