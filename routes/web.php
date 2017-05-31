<?php

Route::get('/', function () {
    return view('form_login');
	});

//---------------------- LOGIN -----------------------------

Route::post('/login/entrar', 'LoginController@logar');

Route::get('/login/logout', 'LoginController@logout');

//-------------------- END LOGIN ---------------------------



//---------------------- EQUIPE ----------------------------

Route::get('/equipe', 'EquipeController@lista');

Route::get('/equipe/crud', 'EquipeController@lista');

Route::get('/equipe/crud', 'EquipeController@novoPreVendedor');

Route::get('/equipe/form_reset', 'EquipeController@formRedefinirSenha');

Route::post('/equipe/reset', 'EquipeController@redefinirSenha');

Route::get('/equipe/crud/delete/{equipe_id}', 'EquipeController@deletaEquipe');

Route::get('/equipe/crud/update/{equipe_id}', 'EquipeController@membroEquipeAtualizar');

Route::post('/equipe/crud', 'EquipeController@novoPreVendedor');

Route::post('/equipe/cadastrar', 'EquipeController@cadastraEquipe');

Route::post('/equipe/atualiza', 'EquipeController@atualizaEquipe');

//---------------------- END EQUIPE--------------------------



//----------------------- ORIGEM ----------------------------

Route::get('/origem', 'OrigemController@lista');

Route::get('/origem/crud/delete/{origem_id}', 'OrigemController@deletaOrigem');

Route::get('/origem/update', 'OrigemController@atualizaOrigem');

Route::post('/origem/update', 'OrigemController@atualizaOrigem');

Route::post('origem/cadastrar', 'OrigemController@cadastraOrigem');

Route::post('/origem/cadastrar/form_lead', 'OrigemController@cadastrarFormLead');

//----------------------- END ORIGEM -------------------------



//----------------------- PEÇA ----------------------------

Route::get('/peca', 'PecaController@lista');

Route::get('/peca/lista', 'PecaController@listaAjax');

Route::get('/peca/getPecaAjax', 'PecaController@getPecaAjax');

Route::get('/peca/crud/delete/{peca_id}', 'PecaController@deletaPeca');

Route::get('/peca/update', 'PecaController@atualizaPeca');

Route::post('/peca/update', 'PecaController@atualizaPeca');

Route::post('/peca/cadastrar', 'PecaController@cadastraPeca');

Route::post('/peca/cadastrar/formProposta', 'PecaController@cadastrarFormProposta');

//----------------------- END ORIGEM -------------------------



//----------------------- MERCADO ----------------------------

Route::get('/mercado', 'MercadoController@lista');

Route::get('/mercado/crud/delete/{mercado_id}', 'MercadoController@deletaMercado');

Route::get('/mercado/update', 'MercadoController@atualizaMercado');

Route::post('/mercado/update', 'MercadoController@atualizaMercado');

Route::post('/mercado/cadastrar', 'MercadoController@cadastraMercado');

Route::post('/mercado/cadastrar/form_lead', 'MercadoController@cadastrarFormLead');

//----------------------- END MERCADO  ------------------------



//----------------------- PRODUTO_LEAD -------------------------

Route::get('/produto_lead', 'Produto_leadController@lista');

Route::get('/produto_lead/lista', 'Produto_leadController@listaAjax');

Route::get('/produto_lead/crud/delete/{produto_lead_id}', 'Produto_leadController@deletaProdutoLead');

Route::get('/produto_lead/update', 'Produto_leadController@atualizaProdutoLead');

Route::post('/produto_lead/update', 'Produto_leadController@atualizaProdutoLead');

Route::post('/produto_lead/cadastrar', 'Produto_leadController@cadastraProdutoLead');

Route::post('/produto_lead/cadastrar/form_lead', 'Produto_leadController@cadastrarFormLead');

Route::post('/produto_lead/cadastrar/formProposta', 'Produto_leadController@cadastrarFormProposta');

//--------------------- END PRODUTO_LEAD -----------------------



//--------------------------- LEAD -----------------------------

Route::get('/lead', 'LeadController@form');

Route::get('/lead/lista', 'LeadController@listaSelect');

Route::get('/lead/listaContatos', 'LeadController@listaContatosSelect');

Route::get('/lead/cadastrar', 'LeadController@cadastraLead');

Route::get('/lead/base', 'LeadController@lista');

Route::get('/lead/info/{lead_id}', 'LeadController@info');

Route::get('/lead/timeline/{lead_id}', 'LeadController@cadastraComentario');

Route::get('/lead/update/{lead_id}', 'LeadController@formAtualizaLead');

Route::get('/lead/delete/{lead_id}', 'LeadController@deletaLead');

Route::post('/lead/update', 'LeadController@atualizaLead');

//------------------------  END LEAD ---------------------------



//--------------------------- PROPOSTA ----------------------------

Route::get('/proposta', 'PropostaController@form');

Route::get('/proposta/lista', 'PropostaController@info');

Route::get('/proposta/download_pdf/{proposta_id}', 'PDFController@downloadPropostaPDF');

Route::get('/proposta/stream_pdf/{proposta_id}', 'PDFController@streamPropostaPDF');

Route::get('/proposta/send_email/{proposta_id}', 'EmailController@enviarProposta');

Route::get('/proposta/send_pesquisa/{proposta_id}', 'EmailController@enviarPesquisa');

Route::post('/proposta/cadastrar', 'PropostaController@cadastraProposta');

//------------------------ END PROPOSTA ---------------------------



//--------------------------- CONTATOS ----------------------------

Route::get('/contatos', 'ContatosController@listaContatosSelect');

//------------------------ END CONTATOS ---------------------------



//--------------------------- REDE_SOCIAL ---------------------------

Route::post('/rede_social/cadastrar/form_lead', 'Rede_socialController@cadastraRede_Social');

//------------------------- END REDE_SOCIAL -------------------------



//--------------------------- EMAIL ----------------------------

Route::get('/email', 'EmailController@testeMail');

//------------------------ END EMAIL ---------------------------



//---------------------------- PDF -----------------------------

//Route::get('/PDF/create', 'PDFController@createPDF');

//Route::get('/proposta/pdf_download/{{ $p->proposta_id }}', 'PDFController@downloadPDF');

//Route::get('/PDF', 'PDFController@createPDF');
//------------------------- END PDF ----------------------------



//-------------------------- PESQUISA --------------------------

Route::get('/pesquisa/aprovada', 'PesquisaController@formPesquisaAprovada');

Route::get('/pesquisa/reprovada', 'PesquisaController@formPesquisaReprovada');

Route::post('/pesquisa/cadastrar', 'PesquisaController@cadastraPesquisaAprovada');

Route::post('/pesquisa/reprovada/cadastrar', 'PesquisaController@cadastraPesquisaReprovada');

//----------------------- END PESQUISA --------------------------



//-------------------------- PESQUISA --------------------------

Route::get('/relatorios', 'RelatoriosController@form');

Route::get('/relatorios/pesquisas', 'RelatoriosController@relatorio_pesquisas');

Route::get('/relatorios/leads', 'RelatoriosController@relatorio_leads');

Route::get('/relatorios/propostas', 'RelatoriosController@relatorio_propostas_enviadas');

//----------------------- END PESQUISA --------------------------



//-------------------------- PESQUISA --------------------------

Route::get('/dashboard', 'DashboardController@info');

//----------------------- END PESQUISA --------------------------



//-------------------------- AGENDA --------------------------

Route::get('/agenda', 'AgendaController@info');

Route::get('/agenda/lista', 'AgendaController@lista');

Route::post('/agenda/cadastrar', 'AgendaController@cadastraEvento');



//----------------------- END PESQUISA --------------------------
