<?php

require_once "vendor/autoload.php";

$nfe = new NFePHP\NFe\Make();

$std = new \stdClass();
$std->versao = '3.10';
$nfe->taginfNFe($std);

$std = new \stdClass();
/*
    Código da UF do emitente do Documento Fiscal. Utilizar a
    Tabela do IBGE de código de unidades da federação (Anexo IX
    - Tabela de UF, Município e País)
 */
$std->cUF = 35;
/*
Código numérico que compõe a Chave de Acesso. Número
aleatório gerado pelo emitente para cada NF-e para evitar
acessos indevidos da NF-e. (v2.0)
 */
$std->cNF = '80070008';
//Informar a natureza da operação de que decorrer a saída ou a
//entrada, tais como: venda, compra, transferência, devolução,
//importação, consignação, remessa (para fins de demonstração,
//de industrialização ou outra), conforme previsto na alínea 'i',
//inciso I, art. 19 do CONVÊNIO S/Nº, de 15 de dezembro de
//1970
$std->natOp = 'VENDA';
//0=Pagamento a vista;
//1=Pagamento a prazo;
//2=Outros.
$std->indPag = 0;
//55=NF-e emitida em substituição ao modelo 1 ou 1A;
//65=NFC-e, utilizada nas operações de venda no varejo (a
//critério da UF aceitar este modelo de documento).
$std->mod = 65;
//Série do Documento Fiscal, preencher com zeros na hipótese
//de a NF-e não possuir série. (v2.0)
//Série 890-899: uso exclusivo para emissão de NF-e avulsa, pelo
//contribuinte com seu certificado digital, através do site do Fisco
//(procEmi=2). (v2.0)
//Serie 900-999: uso exclusivo de NF-e emitidas no SCAN. (v2.0)
$std->serie = 1;
//Número do Documento Fiscal.
$std->nNF = 2;
//Data e hora no formato UTC (Universal Coordinated Time):
//AAAA-MM-DDThh:mm:ssTZD
$std->dhEmi = '2018-05-29T20:48:00-02:00';
//Data e hora no formato UTC (Universal Coordinated Time):
//AAAA-MM-DDThh:mm:ssTZD.
//Não informar este campo para a NFC-e.
//$std->dhSaiEnt = '2018-05-29T20:48:00-02:00';
//Tipo de operação
//0=Entrada;
//1=Saída
$std->tpNF = 1;
//Identificador de local de destino da operação
//1=Operação interna;
//2=Operação interestadual;
//3=Operação com exterior.
$std->idDest = 1;
//Código do Município de Ocorrência do Fato Gerador
//Informar o município de ocorrência do fato gerador do ICMS.
//Utilizar a Tabela do IBGE (Anexo IX - Tabela de UF, Município e
//País)
$std->cMunFG = 3518800;
//Formato de Impressão do DANFE
//0=Sem geração de DANFE;
//1=DANFE normal, Retrato;
//2=DANFE normal, Paisagem;
//3=DANFE Simplificado;
//4=DANFE NFC-e;
//5=DANFE NFC-e em mensagem eletrônica (o envio de
//mensagem eletrônica pode ser feita de forma simultânea com a
//impressão do DANFE; usar o tpImp=5 quando esta for a única
//forma de disponibilização do DANFE).
$std->tpImp = 4;
//Tipo de Emissão da NF-e
//1=Emissão normal (não em contingência);
//2=Contingência FS-IA, com impressão do DANFE em formulário
//de segurança;
//3=Contingência SCAN (Sistema de Contingência do Ambiente
//Nacional);
//4=Contingência DPEC (Declaração Prévia da Emissão em
//Contingência);
//***5=Contingência FS-DA, com impressão do DANFE em
//formulário de segurança;
//6=Contingência SVC-AN (Sefaz Virtual de Contingência do Ambiente Nacional);
//7=Contingência SVC-RS (SEFAZ Virtual de Contingência do RS);
//***9=Contingência off-line da NFC-e (as demais opções de
//contingência são válidas também para a NFC-e).
/*** 
    Para a NFC-e somente estão disponíveis e são válidas as
    opções de contingência 5 e 9.
 ***/
$std->tpEmis = 1;
//Dígito Verificador da Chave de Acesso da NF-e
//Informar o DV da Chave de Acesso da NF-e, o DV será
//calculado com a aplicação do algoritmo módulo 11 (base 2,9) da
//Chave de Acesso. (vide item 5 do Manual de Orientação)
$std->cDV = 2;
//Identificação do Ambiente
//1=Produção/2=Homologação
// Deixe o tpAmb igual a 2 para emitir a nota em ambiente de homologação(teste);
// as notas fiscais assim emitidas não têm valor fiscal
$std->tpAmb = 2;
//Finalidade de emissão da NF-e
//1=NF-e normal;
//2=NF-e complementar;
//3=NF-e de ajuste;
//4=Devolução de mercadoria.
$std->finNFe = 1;
//Indica operação com Consumidor final
//0=Normal;
//1=Consumidor final;
$std->indFinal = 0;
//Indicador de presença do comprador no estabelecimento comercial no momento da
//operação
//0=Não se aplica (por exemplo, Nota Fiscal complementar ou de
//ajuste);
//1=Operação presencial;
//2=Operação não presencial, pela Internet;
//3=Operação não presencial, Teleatendimento;
//4=NFC-e em operação com entrega a domicílio;
//9=Operação não presencial, outros.
$std->indPres = 4;
//Processo de emissão da NF-e
//0=Emissão de NF-e com aplicativo do contribuinte;
//1=Emissão de NF-e avulsa pelo Fisco;
//2=Emissão de NF-e avulsa, pelo contribuinte com seu certificado digital,
//  através do site do Fisco;
//3=Emissão NF-e pelo contribuinte com aplicativo fornecido pelo Fisco.
$std->procEmi = '0';
//Versão do Processo de emissão da NF-e
//Informar a versão do aplicativo emissor de NF-e.
$std->verProc = 0;

$nfe->tagide($std);

$std = new \stdClass();
//Razão Social ou nome do Contribuinte
$std->xNome = 'Empresa teste';
$std->IE = '6564344535';
$std->CRT = 3;
$std->CNPJ = '78767865000156';
$nfe->tagemit($std);

$std = new \stdClass();
$std->xLgr = "Rua Teste";
$std->nro = '203';
$std->xBairro = 'Centro';
$std->cMun = '4317608';
$std->xMun = 'Porto Alegre';
$std->UF = 'RS';
$std->CEP = '51030640';
$std->cPais = '1058';
$std->xPais = 'BRASIL';
$nfe->tagenderEmit($std);

$std = new \stdClass();
$std->xNome = 'Empresa destinatário teste';
$std->indIEDest = 1;
$std->IE = '6564344535';
$std->CNPJ = '78767865000156';
$nfe->tagdest($std);

$std = new \stdClass();
$std->xLgr = "Rua Teste";
$std->nro = '203';
$std->xBairro = 'Centro';
$std->cMun = '4317608';
$std->xMun = 'Porto Alegre';
$std->UF = 'RS';
$std->CEP = '51030640';
$std->cPais = '1058';
$std->xPais = 'BRASIL';
$nfe->tagenderDest($std);

$std = new \stdClass();
$std->item = 1;
$std->cProd = '0001';
$std->xProd = "Produto teste";
$std->NCM = '66554433';
$std->CFOP = '5102';
$std->uCom = 'PÇ';
$std->qCom = '1.0000';
$std->vUnCom = '10.99';
$std->vProd = '10.99';
$std->uTrib = 'PÇ';
$std->qTrib = '1.0000';
$std->vUnTrib = '10.99';
$std->indTot = 1;
$nfe->tagprod($std);

$std = new \stdClass();
$std->item = 1;
$std->vTotTrib = 10.99;
$nfe->tagimposto($std);

$std = new \stdClass();
$std->item = 1;
$std->orig = 0;
$std->CST = '00';
$std->modBC = 0;
$std->vBC = 0.29;
$std->pICMS = '18.0000';
$std->vICMS ='0.04';
$nfe->tagICMS($std);

$std = new \stdClass();
$std->item = 1;
$std->cEnq = '999';
$std->CST = '50';
$std->vIPI = 0;
$std->vBC = 0;
$std->pIPI = 0;
$nfe->tagIPI($std);

$std = new \stdClass();
$std->item = 1;
$std->CST = '07';
$std->vBC = 0;
$std->pPIS = 0;
$std->vPIS = 0;
$nfe->tagPIS($std);

$std = new \stdClass();
$std->item = 1;
$std->vCOFINS = 0;
$std->vBC = 0;
$std->pCOFINS = 0;
$nfe->tagCOFINSST($std);

$std = new \stdClass();
$std->vBC = 0.20;
$std->vICMS = 0.04;
$std->vICMSDeson = 0.00;
$std->vBCST = 0.00;
$std->vST = 0.00;
$std->vProd = 10.99;
$std->vFrete = 0.00;
$std->vSeg = 0.00;
$std->vDesc = 0.00;
$std->vII = 0.00;
$std->vIPI = 0.00;
$std->vPIS = 0.00;
$std->vCOFINS = 0.00;
$std->vOutro = 0.00;
$std->vNF = 11.03;
$std->vTotTrib = 0.00;
$nfe->tagICMSTot($std);

$std = new \stdClass();
$std->modFrete = 1;
$nfe->tagtransp($std);

$std = new \stdClass();
$std->item = 1;
$std->qVol = 2;
$std->esp = 'caixa';
$std->marca = 'OLX';
$std->nVol = '11111';
$std->pesoL = 10.00;
$std->pesoB = 11.00;
$nfe->tagvol($std);

$std = new \stdClass();
$std->nFat = '100';
$std->vOrig = 100;
$std->vLiq = 100;
$nfe->tagfat($std);

$std = new \stdClass();
$std->nDup = '100';
$std->dVenc = '2017-08-22';
$std->vDup = 11.03;
$nfe->tagdup($std);

$xml = $nfe->getXML(); // O conteúdo do XML fica armazenado na variável $xml

$config = [
   "atualizacao" => "2018-02-06 06:01:21",
   "tpAmb" => 2, // Se deixar o tpAmb como 2 você emitirá a nota em ambiente de homologação(teste) e as notas fiscais aqui não tem valor fiscal
   "razaosocial" => "Empresa teste",
   "siglaUF" => "RS",
   "cnpj" => "78767865000156",
   "schemes" => "PL_008i2",
   "versao" => "3.10",
   "tokenIBPT" => "AAAAAAA"
];
$configJson = json_encode($config);
$certificadoDigital = file_get_contents('certificado.pfx');
$tools = new NFePHP\NFe\Tools($configJson, NFePHP\Common\Certificate::readPfx($certificadoDigital, 'leo60128'));
try {
    // O conteúdo do XML assinado fica armazenado na variável $xmlAssinado
    $xmlAssinado = $tools->signNFe($xml);
} catch (\Exception $e) {
    //aqui você trata possíveis exceptions da assinatura
    exit($e->getMessage());
}





