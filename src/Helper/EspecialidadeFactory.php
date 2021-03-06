<?php


namespace App\Helper;

use App\Entity\Especialidade;

class EspecialidadeFactory implements EntityFactoryInterface
{
    public function criar(string $bodyRequest)
    {
        $json = json_decode($bodyRequest);

        $this->verificarTodasAsPropriedades($json);

        $especialidade = new Especialidade();
        $especialidade->setDescricao($json->descricao);
        return $especialidade;
    }

    /**
     * @param $json
     * @throws FactoryException
     */
    public function verificarTodasAsPropriedades($json): void
    {
        if (!property_exists($json, 'descricao')) {
            throw new FactoryException('Especialidade precisa de descricao');
        }
    }
}