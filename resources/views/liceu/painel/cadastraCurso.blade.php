@extends('layouts.dashboard')

@section('title')
Cadastrar Curso
@endsection

@section('menu')
basic minimal pushable
@endsection

@section('content')
<br>
<h1 class="display-3" style="text-align: center; font-size: 50px; padding-right: 5%; padding-left: 5%;">Novo Curso</h1>

<form class="ui form container" action="/curso" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($errors->any())
    <div class="ui red message">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(isset($msg_erro))
    @if($msg_erro === 'Curso Cadastrado Com Sucesso')
    <div class="ui green message">
        @else
        <div class="ui red message">

            @endif
            <ul>
                <li>{{$msg_erro}}</li>
            </ul>
        </div>

        @endif

        <div class="ui form">


            <!-- primeira aba do cadastro -->
            <div class="four fields">
                <div class="field">
                    <label>Unidade</label>
                    <select name="unidade" placeholder="Unidade" required>
                        <option value="{{ old('periodo_inicio') ?? ''}}">{{ old('periodo_inicio') ?? ''}}</option>
                        <!-- <option value="Sambódromo">Sambódromo</option>
                        <option value="PE. Pedro Vignola">PE. Pedro Vignola</option>
                        <option value="Magdalena Arce Daou">Magdalena Arce Daou</option>
                        <option value="Parintins">Parintins</option>
                        <option value="Envira">Envira</option> --> 
                        <!-- <option value="Liceu Digital São Sebastião do Uatumã">Liceu Digital São Sebastião do Uatumã</option> -->
                        <!-- <option value="Liceu Digital Tapauá">Liceu Digital Tapauá</option>
                        <option value="Liceu Digital Tabatinga">Liceu Digital Tabatinga</option> 
                        <option value="Liceu Digital Barcelos">Liceu Digital Barcelos</option>-->
                        <!-- <option value="Liceu Digital Silves">Liceu Digital Silves</option>
                        <option value="Liceu Digital Anori">Liceu Digital Anori</option> -->
                        <!-- <option value="Liceu Digital Tefé">Liceu Digital Tefé</option>
                        <option value="Liceu Digital Boca do Acre">Liceu Digital Boca do Acre</option> 
                        <option value="Liceu Digital Alvarães">Liceu Digital Alvarães</option>-->
                        <option value="Liceu Digital Autazes">Liceu Digital Autazes </option>
                        <option value="Liceu Digital Borba">Liceu Digital Borba </option>
                        <option value="Liceu Digital Careiro da Várzea">Liceu Digital Careiro da Várzea </option>
                        <option value="Liceu Digital Codajás">Liceu Digital Codajás</option>
                        <option value="Liceu Digital Fonte Boa">Liceu Digital Fonte Boa</option>
                        <option value="Liceu Digital Humaitá">Liceu Digital Humaitá</option>
                        <option value="Liceu Digital Itacoatiara">Liceu Digital Itacoatiara</option>
                        <option value="Liceu Digital Urucurituba">Liceu Digital Urucurituba</option>
                        <option value="Liceu Digital Caapiranga">Liceu Digital Caapiranga</option>
                        <option value="Liceu Digital Benjamin Constant">Liceu Digital Benjamin Constant </option>
                        <option value="Liceu Digital São Gabriel da Cachoeira">Liceu Digital São Gabriel da Cachoeira</option>
                        <option value="Liceu Digital Rio Preto da Eva ">Liceu Digital Rio Preto da Eva </option>
                        <option value="Liceu Digital Carauari">Liceu Digital Carauari</option>
                        <option value="Liceu Digital Novo Airão">Liceu Digital Novo Airão</option>
                        <option value="Liceu Digital Iranduba">Liceu Digital Iranduba</option>
                        <option value="Liceu Digital Apui">Liceu Digital Apui</option>
                        <option value="Liceu Digital Presidente Figueiredo">Liceu Digital Presidente Figueiredo</option>
                        <option value="Liceu Digital Manicoré">Liceu Digital Manicoré</option>
                        <option value="Liceu Digital Lábrea">Liceu Digital Lábrea</option>
                        <option value="Liceu Digital Parintins (Vila Amazônica)">Liceu Digital Parintins (Vila Amazônica)</option>
                        <option value="Liceu Digital Coari">Liceu Digital Coari</option>
                        <option value="Liceu Digital Maraã">Liceu Digital Maraã</option>
                    </select>
                </div>
                <div class="field">
                    <label>Núcleo</label>
                    <select name="nucleo" placeholder="Unidade" required>
                        <option value="{{ old('periodo_inicio') ?? ''}}">{{ old('periodo_inicio') ?? ''}}</option>
                        <option value="Artes Visuais">Artes Visuais</option>
                        <option value="Audiovisual">Audiovisual</option>
                        <option value="Dança">Dança</option>
                        <option value="Música">Música</option>
                        <option value="Música Erudita">Música Erudita</option>
                        <option value="Música Popular">Música Popular</option>
                        <option value="Teatro">Teatro</option>
                    </select>
                </div>
                <div class="field">
                    <label>Curso</label>
                    <input type="text" name="curso" placeholder="Curso" value="{{ old('curso') ?? ''}}" required>
                </div>
                <div class="field">
                    <label>Instrutor</label>
                    <input type="text" name="instrutor" placeholder="Instrutor" value="{{ old('instrutor') ?? ''}}" required>
                </div>
            </div>

            <div class="two fields">
                <div class="field">
                    <label>Dia da Semana</label>
                    <div class="inline fields">
                        <div class="field">
                            <div class="ui  checkbox">
                                <input type="checkbox" name="dia[]" value="Segunda">
                                <label>Seg</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox">
                                <input type="checkbox" name="dia[]" value="Terca">
                                <label>Ter</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui  checkbox">
                                <input type="checkbox" name="dia[]" value="Quarta">
                                <label>Qua</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui  checkbox">
                                <input type="checkbox" name="dia[]" value="Quinta">
                                <label>Qui</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui  checkbox">
                                <input type="checkbox" name="dia[]" value="Sexta">
                                <label>Sex</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui  checkbox">
                                <input type="checkbox" name="dia[]" value="Sabado">
                                <label>Sab</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui  checkbox">
                                <input type="checkbox" name="dia[]" value="Domingo">
                                <label>Dom</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field two fields">
                    <div class="field">
                        <label>Horario Inicial</label>
                        <input type="time" name="horario_inicial" placeholder="Horario Inicial" value="{{ old('horario_inicial') ?? ''}}" required>
                    </div>
                    <div class="field">
                        <label>Horario Final</label>
                        <input type="time" name="horario_final" placeholder="Horario Inicial" value="{{ old('horario_final') ?? ''}}" required>
                    </div>
                </div>
            </div>

            <div class="four fields">



                <div class="field">
                    <label>Faixa Etarias Inicial</label>
                    <input type="number" name="faixa_etaria_inicial" placeholder="Faixa Etarias Inicial" value="{{ old('faixa_etaria_inicial') ?? ''}}" required>
                </div>
                <div class="field">
                    <label>Faixa Etarias Final</label>
                    <input type="number" name="faixa_etaria_final" placeholder="Faixa Etarias Final" value="{{ old('faixa_etaria_final') ?? ''}}" required>
                </div>
                <div class="field">
                    <label>Período Inicial</label>
                    <select name="periodo_inicio" placeholder="Período Inicial" required>
                        <option value="{{ old('periodo_inicio') ?? ''}}">{{ old('periodo_inicio') ?? ''}}</option>
                        <option value="Janeiro">Janeiro</option>
                        <option value="Fevereiro">Fevereiro</option>
                        <option value="Março">Março</option>
                        <option value="Abril">Abril</option>
                        <option value="Maio">Maio</option>
                        <option value="Junho">Junho</option>
                        <option value="Julho">Julho</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Setembro">Setembro</option>
                        <option value="Outubro">Outubro</option>
                        <option value="Novembro">Novembro</option>
                        <option value="Dezembro">Dezembro</option>
                    </select>
                </div>
                <div class="field">
                    <label>Período Final</label>
                    <select name="periodo_fim" placeholder="Período Final" required>
                        <option value="{{ old('periodo_fim') ?? ''}}">{{ old('periodo_fim') ?? ''}}</option>
                        <option value="Janeiro">Janeiro</option>
                        <option value="Fevereiro">Fevereiro</option>
                        <option value="Março">Março</option>
                        <option value="Abril">Abril</option>
                        <option value="Maio">Maio</option>
                        <option value="Junho">Junho</option>
                        <option value="Julho">Julho</option>
                        <option value="Agosto">Agosto</option>
                        <option value="Setembro">Setembro</option>
                        <option value="Outubro">Outubro</option>
                        <option value="Novembro">Novembro</option>
                        <option value="Dezembro">Dezembro</option>
                    </select>

                </div>
            </div>
            <div class="two fields">
                <div class="field two fields">
                    <div class="field">
                        <label>Vagas</label>
                        <input type="number" name="vagas" placeholder="Vagas" value="{{ old('vagas') ?? ''}}" required>
                    </div>
                    <div class="field">
                        <label>Vagas Reserva</label>
                        <input type="number" name="vagas_reserva" placeholder="Vagas Reserva" value="{{ old('vagas_reserva') ?? ''}}" required>
                    </div>
                </div>
                <div class="field">
                    <label>Pré-Requisito</label>
                    <input type="text" name="prerequisito" placeholder="Pré-Requisito" value="{{ old('prerequisito') ?? ''}}">
                </div>
                <div class="field">
                    <label>Link para Sala</label>
                    <input type="text" name="link" placeholder="Link" value="{{ old('link') ?? ''}}">
                </div>

            </div>


        </div>

        <div class="sixteen wide column" style=" padding: 5px;" align="center">
            <button class="ui button enviar" type="submit">Salvar</button>
        </div>


</form>

<script>
    $('select.dropdown')
        .dropdown();
</script>
@endsection