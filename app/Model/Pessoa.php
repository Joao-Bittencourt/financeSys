<?php

App::uses('AppModel', 'Model');

class Pessoa extends AppModel {

    public $useTable = 'pessoas';
    public $hasMany = [
        'Conta' => [
            'ClassName' => 'Conta'
        ]
    ];
    public $virtualFields = [
        'nome_cpf' => "
            CONCAT(
                Pessoa.nome,
                ' - ',
                (
                    CONCAT(
                        SUBSTRING(`Pessoa`.`cpf`, 1, 3), 
                        '.' ,
                        SUBSTRING(`Pessoa`.`cpf`, 4, 3),
                        '.',
                        SUBSTRING(`Pessoa`.`cpf`, 7, 3),
                        '-',
                        SUBSTRING(`Pessoa`.`cpf`, 10, 2)
                    )
                )
            )",
        'cpf_formatado' => "(
            CONCAT(
                SUBSTRING(`Pessoa`.`cpf`, 1, 3), 
                '.' ,
                SUBSTRING(`Pessoa`.`cpf`, 4, 3),
                '.',
                SUBSTRING(`Pessoa`.`cpf`, 7, 3),
                '-',
                SUBSTRING(`Pessoa`.`cpf`, 10, 2)
            )
        )"
    ];
    public $validate = [
        'nome' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Campo Nome deve ser preenchido.',
            ],
            'maxLength' => [
                'rule' => ['maxLength', 200],
                'message' => 'O nome deve ter o tamanho maximo de 200 caracteres.'
            ],
            'valida_nome' => [
                'rule' => 'valida_nome',
                'message' => 'Nome não pode conter numeros.',
            ],
        ],
        'cpf' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Campo deve ser preenchido.',
            ],
            'isUnique' => [
                'rule' => 'isUnique',
                'message' => 'CPF já consta na base de dados.',
            ]
        ],
        'endereco' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Campo endereço deve ser preenchido.',
            ],
        ]
    ];

    public function beforeValidate($options = []) {

        if (Hash::get($this->data, 'Pessoa.cpf')) {
            $this->data['Pessoa']['cpf'] = str_replace(['.', '-'], '', $this->data['Pessoa']['cpf']);
        }

        return true;
    }

    public function valida_nome($value) {

        $pessoaNome = Hash::get($value, 'nome');
        if (is_numeric(filter_var($pessoaNome, FILTER_SANITIZE_NUMBER_INT))) {
            return false;
        }

        return true;
    }

}
