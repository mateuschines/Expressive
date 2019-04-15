<?php

declare (strict_types = 1);

namespace Sabium\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Hydrator\ClassMethods;
use JMS\Serializer\Annotation\Type;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Glb.pessoa
 *
 *
 *
 * @ORM\Entity(repositoryClass="\Sabium\Repository\PessoaRepository")
 * @ORM\table(name="glb.pessoa")
 */

class Pessoa
{
    /**
     * @ORM\Id
     * @Assert\NotBlank(message="idcnpj_cpf é obrigatorio")
     * @Type("int")
     * @ORM\Column(name="idcnpj_cpf", type="bigint", nullable=false)
     */
    private $idcnpj_cpf;

    /**
     * @var int|null
     *
     * @Assert\NotBlank(message="idtipopessoa é obrigatorio")
     * @Type("int")
     * @ORM\Column(name="idtipopessoa", type="integer", nullable=true)
     */
    private $idtipopessoa;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idtipocontribuinte", type="integer", nullable=true)
     */
    private $idtipocontribuinte;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idtipocadastro", type="integer", nullable=true)
     */
    private $idtipocadastro;

    /**
     * @var int|null
     *
     * @Assert\NotBlank(message="idsituacaopessoa é obrigatorio")
     * @Type("int")
     * @ORM\Column(name="idsituacaopessoa", type="integer", nullable=true)
     */
    private $idsituacaopessoa;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idtiporesidencia", type="integer", nullable=true)
     */
    private $idtiporesidencia;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idtipoestadocivil", type="integer", nullable=true)
     */
    private $idtipoestadocivil;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idtipoocupacao", type="integer", nullable=true)
     */
    private $idtipoocupacao;

    /**
     * @var int|null
     *
     * @Assert\NotBlank(message="idtiposexo é obrigatorio")
     * @Type("int")
     * @ORM\Column(name="idtiposexo", type="integer", nullable=true)
     */
    private $idtiposexo;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idgrupo", type="integer", nullable=true)
     */
    private $idgrupo;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idconjuge", type="bigint", nullable=true)
     */
    private $idconjuge;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idtipolimite", type="integer", nullable=true)
     */
    private $idtipolimite;

    /**
     * @var string|null
     *
     * @Type("string")
     * @ORM\Column(name="cnpj_cpf", type="string", length=14, nullable=true)
     */
    private $cnpjCpf;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="nome é obrigatorio")
     * @Type("string")
     * @ORM\Column(name="nome", type="string", length=100, nullable=false)
     */
    private $nome;

    /**
     * @var string|null
     *
     * @Type("string")
     * @ORM\Column(name="nomefantasia", type="string", length=100, nullable=true)
     */
    private $nomefantasia;

    /**
     * @var string|null
     *
     * @Assert\NotBlank(message="cce_rg é obrigatorio")
     * @Type("string")
     * @ORM\Column(name="cce_rg", type="string", length=100, nullable=true)
     */
    private $cce_rg;

    /**
     * @var \DateTime|null
     *
     * @Assert\NotBlank(message="datacriacao ou data de nascimento é obrigatorio")
     * @Type("DateTime<'Y-m-d'>")
     * @ORM\Column(name="datacriacao", type="date", nullable=true)
     */
    private $datacriacao;

    /**
     * @var \DateTime|null
     *
     * @Type("DateTime<'Y-m-d'>")
     * @ORM\Column(name="datacadastro", type="date", nullable=true)
     */
    private $datacadastro;

    /**
     * @var \DateTime|null
     *
     * @Type("DateTime<'Y-m-d'>")
     * @ORM\Column(name="dataalteracao", type="datetime", nullable=true)
     */
    private $dataalteracao;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="fornecedor", type="integer", nullable=true)
     */
    private $fornecedor;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="cliente", type="integer", nullable=true)
     */
    private $cliente;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="cpfgerado", type="integer", nullable=true)
     */
    private $cpfgerado;

    /**
     * @var \DateTime|null
     *
     * @Type("DateTime<'Y-m-d'>")
     * @ORM\Column(name="ultimaconsultaspc", type="date", nullable=true)
     */
    private $ultimaconsultaspc;

    /**
     * @var string|null
     *
     * @Type("float")
     * @ORM\Column(name="valorlimitecredito", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $valorlimitecredito;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="gerarboleto", type="integer", nullable=true)
     */
    private $gerarboleto;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idusuario", type="integer", nullable=true)
     */
    private $idusuario;

    /**
     * @var string|null
     *
     * @Type("string")
     * @ORM\Column(name="inscricaosubstitutotributario", type="string", length=100, nullable=true)
     */
    private $inscricaosubstitutotributario;

    /**
     * @var int|null
     *
     * @ORM\Column(name="atualizarcadastro", type="smallint", nullable=true)
     */
    private $atualizarcadastro;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="idnaturezaretencaofonte", type="smallint", nullable=true)
     */
    private $idnaturezaretencaofonte;

    /**
     * @var string|null
     *
     * @Type("int")
     * @ORM\Column(name="chavemd5", type="string", length=40, nullable=true)
     */
    private $chavemd5;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="aposentado", type="integer", nullable=true)
     */
    private $aposentado;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="pensionista", type="integer", nullable=true)
     */
    private $pensionista;

    /**
     * @var string|null
     *
     * @Type("string")
     * @ORM\Column(name="inscricaosuframa", type="string", length=20, nullable=true)
     */
    private $inscricaosuframa;

    /**
     * @var string|null
     *
     * @Type("float")
     * @ORM\Column(name="limitecreditoadicional", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $limitecreditoadicional = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="inscricaomunicipal", type="string", length=20, nullable=true)
     */
    private $inscricaomunicipal;

    /**
     * @var string|null
     *
     * @Type("string")
     * @ORM\Column(name="apelidoftp", type="string", length=30, nullable=true)
     */
    private $apelidoftp;

    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="aceite", type="integer", nullable=true, options={"default"="1"})
     */
    private $aceite = '1';


    /**
     * @var int|null
     *
     * @Type("int")
     * @ORM\Column(name="emancipado", type="integer", nullable=true)
     */
    private $emancipado;


    public function getIdCnpjCpf()
    {
        return $this->idcnpj_cpf;
    }


    public function setIdCnpjCpf($idcnpj_cpf)
    {
        $this->idcnpj_cpf = $idcnpj_cpf;

        return $this;
    }

    public function getIdtipopessoa()
    {
        return $this->idtipopessoa;
    }

    public function setIdtipopessoa($idtipopessoa)
    {
        $this->idtipopessoa = $idtipopessoa;

        return $this;
    }

    public function getIdsituacaopessoa()
    {
        return $this->idsituacaopessoa;
    }

    public function setIdsituacaopessoa($idsituacaopessoa)
    {
        $this->idsituacaopessoa = $idsituacaopessoa;

        return $this;
    }

    public function getIdtiposexo()
    {
        return $this->idtiposexo;
    }

    public function setIdtiposexo($idtiposexo)
    {
        $this->idtiposexo = $idtiposexo;

        return $this;
    }

    public function getCnpjCpf()
    {
        return $this->cnpjCpf;
    }

    public function setCnpjCpf($cnpjCpf)
    {
        $this->cnpjCpf = $cnpjCpf;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCceRg()
    {
        return $this->cce_rg;
    }

    public function setCceRg($cce_rg)
    {
        $this->cce_rg = $cce_rg;

        return $this;
    }

    public function getDatacriacao()
    {
        return $this->datacriacao;
    }

    public function setDatacriacao($datacriacao)
    {
        $this->datacriacao = $datacriacao;

        return $this;
    }

    public function getPessoa(): array
    {
        return [
            'idcnpj_cpf' => $this->getIdCnpjCpf(),
            'idtipopessoa' => $this->getIdtipopessoa(),
            'idsituacaopessoa' => $this->getIdsituacaopessoa(),
            'idtiposexo' => $this->getIdtiposexo(),
            'cnpj_cpf' => $this->getCnpjCpf(),
            'nome' => $this->getNome(),
            'cce_rg' => $this->getCceRg(),
            'datacriacao' => $this->getDatacriacao(),
        ];
    }

    public function setPessoa(array $requestBody): void
    {
        $this->setIdCnpjCpf($requestBody['idcnpj_cpf']);
        $this->setIdtipopessoa($requestBody['idtipopessoa']);
        $this->setIdsituacaopessoa($requestBody['idsituacaopessoa']);
        $this->setIdtiposexo($requestBody['idtiposexo']);
        $this->setCnpjCpf($requestBody['cnpj_cpf']);
        $this->setNome($requestBody['nome']);
        $this->setCceRg($requestBody['cce_rg']);
        $this->setDatacriacao($requestBody['datacriacao']);
        if (!isset($requestBody['is_active'])) {
            $this->setIsActive(1);
        } else {
            $this->setIsActive($requestBody['is_active']);
        }
    }

    public function __construct(array $data = [])
    {
        (new ClassMethods())->hydrate($data, $this);
    }

    /**
    * @return array
    */
    public function toArray(): array
    {
        return (new ClassMethods())->extract($this);
    }
}
