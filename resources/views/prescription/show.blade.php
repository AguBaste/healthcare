
<style>
    *{
        margin: 0;
        padding: 0;
        list-style: none;
    }
    .contenedor{
        width: 500px;
        margin: auto;
    }
    .info-clinica{
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }
    span{
        text-transform: capitalize;
        font-weight: bold;
    }
    .info-paciente{
        display: flex;
        flex-direction: column;
        align-items:start;
        margin: 20px;
        gap: 10px;
    }
    .lista{
         display: flex;
        flex-direction: column;
        align-items:start;
        margin: 20px;
        gap: 10px;
    }
    .item{
        font-weight: bold;
        text-transform: capitalize;
    }
    .cursiva{
        font-style:italic;
    }
    p{
        margin-top: 80px;
        margin-left:20px; 
    }
    .btn{
        margin: 20px;
        background-color:green;
        border: none;
        color: white; 
        padding: 20px;
        border-radius:5px;
        text-transform: uppercase;
    }
</style>
<div class="contenedor">
    <ul class="info-clinica">
        <li>Clinica San Jorge </li>
        <li>Colon 1234, San  luis</li>
        <li>Tel: 2664331306</li>
    </ul>
    <ul class="info-paciente">
    <li>Paciente: <span>{{ $prescription->user->name . ' ' . $prescription->user->lastname }}</span></li>
    <li>DNI: <span>{{ $prescription->user->dni }}</span> </li>
    <li>Obra Social: <span>{{ $prescription->user->insurance }}</span> </li>
    <li>Número de Afiliado: <span> {{ $prescription->user->member_id }}</span></li>
</ul>
<ul class="lista">
    <li class="item">fecha {{ $prescription->date->format('d-m-Y') }}</li>
    <li class="item">RP</li>
    <li class="cursiva">{{ $prescription->formula }}</li>
    <li class="cursiva">{{ $prescription->dosis }}</li>
    <li class="cursiva">diagnostico {{ $prescription->diagnostic }}</li>
</ul>
<ul class="info-clinica">
    <li>Dr: <span>{{ $provider->name . ' ' . $provider->lastname }}</span></li>  
    <li><span>{{ $provider->specialty }}</span></li>
    <li>Matrícula: <span>{{ $provider->license }}</span></li>
</ul>
<p>Firma:</p>
<button class="btn" id="print">imprimir</button>

</div>


<script>
    const button = document.getElementById('print');

    button.addEventListener('click', function() {
        button.style.display = 'none';
        window.print();
    })
</script>
