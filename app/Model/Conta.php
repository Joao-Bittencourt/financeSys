<?php

App::uses('AppModel', 'Model');

class Conta extends AppModel {

    public $useTable = 'contas';
    public $belongsTo = [
        'Pessoa' => [
            'ClassName' => 'Pessoa'
        ]
    ];
    public $hasMany = [
        'Movimentacao' => [
            'ClassName' => 'Movimentacao'
        ]
    ];
    public $virtualFields = [
        'conta_saldo' => "(
                CONCAT(
                    Conta.numero_conta,
                    ' - Saldo : R$ ',
                    FORMAT(
                        COALESCE(
                            (SELECT 
                                SUM(
                                    CASE WHEN Movimentacao.tipo_movimentacao = 'D'
                                        THEN (Movimentacao.valor *-1)
                                        ELSE Movimentacao.valor
                                    END
                                )
                            FROM movimentacoes AS Movimentacao 
                            WHERE Movimentacao.conta_id = Conta.id 
                        ),
                        '0.00')
                    , 2, 'de_DE')
                )
            )"
    ];
    public $validate = [
        'numero_conta' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Campo deve ser preenchido',
            ],
            'numeric' => [
                'rule' => 'numeric',
                'message' => 'Informe apenas Numeros',
            ],
            'isUnique' => [
                'rule' => 'isUnique',
                'message' => 'Conta já consta na base de dados',
            ]
        ],
        'pessoa_id' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Informe a Pessoa',
            ],
        ]
    ];

    public function buscaListaContaSaldo() {

        $this->virtualFields['conta_numero_saldo'] = [];
        $options = [];

        $options['fields'][] = 'Conta.id';
        $options['fields'][] = 'Conta.conta_saldo';

        return $this->find('list', $options);
    }

    public function valida_reqistros_deletar($id = null) {

        if (empty($id)) {
            return false;
        }

        $contaMovimentacaoQuantidade = $this->Movimentacao->find('count', [
            'conditions' => [
                'Movimentacao.conta_id' => $id
            ]
        ]);
        
        if ($contaMovimentacaoQuantidade > 0) {
            return false;
        }
        
        return true;
    }

}
