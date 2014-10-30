<?php
    
error_reporting(E_ALL);
ini_set("display_errors", 1);

  require_once("./config.php");
  
  $obj = NULL;
      
  $noticia = new NOTICIA();
  $noticia->titulo="<h1>Após as eleições, Copom surpreende e sobe juros para 11,25% ao ano</h1>";
  $noticia->autor="G & T Informática";
  $noticia->previa="Mercado financeiro acreditava que juros seriam mantidos em 11% ao ano. Inflação soma 6,75% em 12 meses até setembro, mas atividade está fraca.";
  $noticia->fonte_url="http://g1.globo.com/economia/noticia/2014/10/apos-eleicoes-copom-surpreende-e-sobe-juros-para-1125-ao-ano.html";
  $noticia->descricao_completa=" Em sua primeira reunião após a reeleição da presidente Dilma Rousseff, o Comitê de Política Monetária (Copom) surpreendeu ao elevar a taxa básica de juros da economia brasileira de 11% para 11,25% ao ano. Foi a primeira elevação desde abril deste ano, o que levou a taxa de juros ao maior patamar desde o fim de 2011.
                                A decisão surpreendeu a maior parte dos economistas do mercado financeiro, que apostavam maciçamente em nova manutenção da taxa básica da economia em 11% ao ano. A decisão acontece em um momento de fraca atividade econômica, tendo o Produto Interno Bruto (PIB) registrado retração no primeiro e segundo trimestres deste ano – o que configura recessão técnica – embora a inflação em doze meses até setembro tenha somado 6,75%, acima do teto de 6,5% do sistema de metas brasileiro.
                                O próprio Banco Central havia sinalizado, na ata da última reunião, ocorrida em setembro, que os juros não deveriam ser reduzidos, mas não havia deixado claro que a taxa poderia ser elevada. Na ocasião, informou que seria plausível afirmar que, levando em conta estratégia de não redução do instrumento de política monetária (juro), a inflação tenderia a entrar em trajetória de convergência para a meta nos trimestres finais do horizonte de projeção (2016).
                                Segundo analistas, vários fatores que influenciam a inflação se contrapõem neste momento. O baixo nível de atividade e a queda dos preços das 'commodities' (produtos básicos com cotação internacional) atuam para conter a inflação, ao mesmo tempo em que a alta do dólar e dos preços administrados (como telefonia, água, energia, combustíveis e tarifas de ônibus, entre outros), continuam pressionando os preços. Além disso, a inflação de serviços, impulsionada pelos ganhos reais de salários, segue elevada.
                                Decisão não foi unânime
                                A decisão do Copom, entretanto, não foi unânime. Votaram pela elevação da taxa Selic o presidente da instituição, Alexandre Tombini, além dos diretores Aldo Mendes, Anthero de Moraes Meirelles, Carlos Hamilton e Sidnei Corrêa Marques. Votaram pela manutenção da taxa Selic em 11% ao ano os seguintes integrantes do Comitê: Altamir Lopes, Luiz Awazu Pereira da Silva e Luiz Edson Feltrim.
                                Ao fim do encontro, foi divulgada a seguinte explicação: 'Para o Comitê, desde sua última reunião, entre outros fatores, a intensificação dos ajustes de preços relativos na economia tornou o balanço de riscos para a inflação menos favorável. À vista disso, o Comitê considerou oportuno ajustar as condições monetárias de modo a garantir, a um custo menor, a prevalência de um cenário mais benigno para a inflação em 2015 e 2016'.
                                Metas de inflação
                                Pelo sistema de metas de inflação vigente na economia brasileira, o BC tem de calibrar os juros para atingir objetivos pré-determinados. Para 2014, 2015 e 2016, a meta central de inflação é de 4,5%, mas o IPCA, que serve de referência para o sistema brasileiro, pode oscilar entre 2,5% e 6,5% sem que a meta seja formalmente descumprida.
                                No fim de setembro, o Banco Central estimou, por meio do relatório de inflação, um IPCA de 6,3% para este ano e de 5,8% a 6,1% para 2015, ou seja, valor ainda distante da meta central de 4,5% para ambos os anos. Segundo a autoridade monetária informou naquele momento, a inflação começará a convergir mais fortemente para a meta central somente em 2016.
                                Em doze meses até setembro, o IPCA somou 6,75% - acima do teto de 6,5% do sistema de metas brasileiro. Entretanto, o governo considera que a meta foi cumprida ou não apenas com base no acumulado em 12 meses até dezembro de cada ano.
                                Política econômica
                                A política econômica foi alvo de ataques da oposição durante a campanha presidencial deste ano. O baixo crescimento da economia brasileira, assim como o fato de a inflação estar oscilando ao redor de 6% nos últimos anos, foi atacada pelo candidato do PSDB, Aécio Neves
                                De acordo com Silvio Campos Neto, economista-sênior da Tendências Consultoria, houve 'perda de credibilidade' do BC, uma vez que a inflação oscilou ao redor de 6% nos últimos anos e meses, mais próxima do teto do sistema de metas, do que do objetivo central de 4,5%. Para ele, a instituição teria de promover um aumento muito grande da taxa neste momento para tentar retomar a confiança.
                                'A politica macroeconômica está muito desajustada, especialmente o lado fiscal [gastos públicos] nos últimos anos. Isso dificulta ainda mais o lado da política monetária [definição dos juros]. É importante recolocar a parte macroeconômica em ordem, com uma política mais consistente fiscal e monetária, e mostrar como lidar com o câmbio, zerando o jogo, e passar para a sociedade quais são os objetivos', avaliou o economista da Tendências, antes da reunião do Copom.";
    
   $noticia->ativa=1;
   $noticia->views=0;

  $obj = new NOTICIAS_NEGOC();
  echo $obj->Inserir($noticia);
  

?>
