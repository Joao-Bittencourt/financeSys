<?php

App::uses('AppModel', 'Model');

class Movimentacao extends AppModel {

    public $useTable = 'movimentacoes';
    public $belongsTo = [
        'Pessoa' => [
            'ClassName' => 'Pessoa'
        ],
        'Conta' => [
            'ClassName' => 'Conta'
        ]
    ];
    
    public $virtualFields = [
        'saldo' => "(SELECT
            SUM(
                CASE WHEN movimentacoes.tipo_movimentacao = 'D'
                    THEN (movimentacoes.valor *-1)
                    ELSE movimentacoes.valor
                END
            )
            FROM movimentacoes 
            WHERE Movimentacao.conta_id = movimentacoes.conta_id
        )"
    ];
    public $validate = [
        'dt_movimento' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Informe a data de movimentação',
            ],
        ],
        'tipo_movimentacao' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Informe o tipo de movimentação',
            ],
            'valida_tipo_movimentacao' => [
                'rule' => 'valida_tipo_movimentacao',
                'message' => 'Informe corretamente o tipo de movimentação',
            ],
        ],
        'valor' => [
            'valida_valor_saldo' => [
                'rule' => 'valida_valor_saldo',
                'message' => 'Saldo insuficiente para movimentação.',
            ],
        ],
        'conta_id' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Informe a Conta',
            ],
        ],
        'pessoa_id' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Informe a Pessoa',
            ],
        ]
    ];

    public function beforeValidate($options = []) {
        parent::beforeValidate();

        if (Hash::get($this->data, 'Movimentacao.valor')) {
            $this->data['Movimentacao']['valor'] = str_replace(',', '.', str_replace('.', '', $this->data['Movimentacao']['valor']));
        }

        return true;
    }

    public function valida_tipo_movimentacao($value) {
        
        $tipo_movimentacao = Hash::get($value, 'tipo_movimentacao');
        if (!in_array($tipo_movimentacao, ['C', 'D'])) {
            return false;
        }

        return true;
    }

    public function valida_valor_saldo() {
        
        $tipo_movimentacao = Hash::get($this->data, 'Movimentacao.tipo_movimentacao');

        if ($tipo_movimentacao == 'D') {
            $valor = Hash::get($this->data, 'Movimentacao.valor');
            $contaId = Hash::get($this->data, 'Movimentacao.conta_id', 0);

            $options['fields'][] = 'Movimentacao.saldo';
            $options['conditions'] = [
                'Movimentacao.conta_id' => $contaId
            ];

            $saldoConta = $this->find('first', $options);
            $saldoContaValor = Hash::get($saldoConta, 'Movimentacao.saldo');

            if ($saldoContaValor < $valor) {
                return false;
            }
        }

        return true;
    }

}
