<livewire:table-component
        model="App\Models\Coli"
        :columns="[
            ['key' => 'code', 'label' => 'Code'],
            ['key' => 'destinataire', 'label' => 'Destinataire'],
        ]"
        :actions="[
            ['route' => 'client.colis.index', 'label' => 'Modifier', 'param' => 'id'],
        ]"
    />
