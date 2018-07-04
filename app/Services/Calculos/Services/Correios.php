<?php
/**
 * Created by PhpStorm.
 * User: leandrorichard
 * Date: 04/07/18
 * Time: 16:39
 */

namespace App\Services\Calculos\Services;


class Correios
{
    private $nCdEmpresa;
    private $sDsSenha;
    private $sCepOrigem;
    private $sCepDestino;
    private $nVlPeso;
    private $nCdFormato;
    private $nVlComprimento;
    private $nVlAltura;
    private $nVlLargura;
    private $nVlDiametro;
    private $sCdMaoPropria;
    private $nVlValorDeclarado;
    private $sCdAvisoRecebimento;
    private $StrRetorno;
    private $nCdServico;

    /**
     * @return mixed
     */
    public function getNCdEmpresa()
    {
        return $this->nCdEmpresa;
    }

    /**
     * @param mixed $nCdEmpresa
     */
    public function setNCdEmpresa($nCdEmpresa)
    {
        $this->nCdEmpresa = $nCdEmpresa;
    }

    /**
     * @return mixed
     */
    public function getSDsSenha()
    {
        return $this->sDsSenha;
    }

    /**
     * @param mixed $sDsSenha
     */
    public function setSDsSenha($sDsSenha)
    {
        $this->sDsSenha = $sDsSenha;
    }

    /**
     * @return mixed
     */
    public function getSCepOrigem()
    {
        return $this->sCepOrigem;
    }

    /**
     * @param mixed $sCepOrigem
     */
    public function setSCepOrigem($sCepOrigem)
    {
        $this->sCepOrigem = $sCepOrigem;
    }

    /**
     * @return mixed
     */
    public function getSCepDestino()
    {
        return $this->sCepDestino;
    }

    /**
     * @param mixed $sCepDestino
     */
    public function setSCepDestino($sCepDestino)
    {
        $this->sCepDestino = $sCepDestino;
    }

    /**
     * @return mixed
     */
    public function getNVlPeso()
    {
        return $this->nVlPeso;
    }

    /**
     * @param mixed $nVlPeso
     */
    public function setNVlPeso($nVlPeso)
    {
        $this->nVlPeso = $nVlPeso;
    }

    /**
     * @return mixed
     */
    public function getNCdFormato()
    {
        return $this->nCdFormato;
    }

    /**
     * @param mixed $nCdFormato
     */
    public function setNCdFormato($nCdFormato)
    {
        $this->nCdFormato = $nCdFormato;
    }

    /**
     * @return mixed
     */
    public function getNVlComprimento()
    {
        return $this->nVlComprimento;
    }

    /**
     * @param mixed $nVlComprimento
     */
    public function setNVlComprimento($nVlComprimento)
    {
        $this->nVlComprimento = $nVlComprimento;
    }

    /**
     * @return mixed
     */
    public function getNVlAltura()
    {
        return $this->nVlAltura;
    }

    /**
     * @param mixed $nVlAltura
     */
    public function setNVlAltura($nVlAltura)
    {
        $this->nVlAltura = $nVlAltura;
    }

    /**
     * @return mixed
     */
    public function getNVlLargura()
    {
        return $this->nVlLargura;
    }

    /**
     * @param mixed $nVlLargura
     */
    public function setNVlLargura($nVlLargura)
    {
        $this->nVlLargura = $nVlLargura;
    }

    /**
     * @return mixed
     */
    public function getNVlDiametro()
    {
        return $this->nVlDiametro;
    }

    /**
     * @param mixed $nVlDiametro
     */
    public function setNVlDiametro($nVlDiametro)
    {
        $this->nVlDiametro = $nVlDiametro;
    }

    /**
     * @return mixed
     */
    public function getSCdMaoPropria()
    {
        return $this->sCdMaoPropria;
    }

    /**
     * @param mixed $sCdMaoPropria
     */
    public function setSCdMaoPropria($sCdMaoPropria)
    {
        $this->sCdMaoPropria = $sCdMaoPropria;
    }

    /**
     * @return mixed
     */
    public function getNVlValorDeclarado()
    {
        return $this->nVlValorDeclarado;
    }

    /**
     * @param mixed $nVlValorDeclarado
     */
    public function setNVlValorDeclarado($nVlValorDeclarado)
    {
        $this->nVlValorDeclarado = $nVlValorDeclarado;
    }

    /**
     * @return mixed
     */
    public function getSCdAvisoRecebimento()
    {
        return $this->sCdAvisoRecebimento;
    }

    /**
     * @param mixed $sCdAvisoRecebimento
     */
    public function setSCdAvisoRecebimento($sCdAvisoRecebimento)
    {
        $this->sCdAvisoRecebimento = $sCdAvisoRecebimento;
    }

    /**
     * @return mixed
     */
    public function getStrRetorno()
    {
        return $this->StrRetorno;
    }

    /**
     * @param mixed $StrRetorno
     */
    public function setStrRetorno($StrRetorno)
    {
        $this->StrRetorno = $StrRetorno;
    }

    /**
     * @return mixed
     */
    public function getNCdServico()
    {
        return $this->nCdServico;
    }

    /**
     * @param mixed $nCdServico
     */
    public function setNCdServico($nCdServico)
    {
        $this->nCdServico = $nCdServico;
    }

    function toArray(): array {
        $object = $this;
        $reflectionClass = new \ReflectionClass(get_class($object));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }
        return $array;
    }
}