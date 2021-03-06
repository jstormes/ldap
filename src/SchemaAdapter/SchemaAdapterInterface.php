<?php
/**
 * Created by PhpStorm.
 * User: jstormes
 * Date: 10/5/2018
 * Time: 1:29 PM
 */

declare(strict_types=1);

namespace JStormes\Ldap\SchemaAdapter;

use JStormes\Ldap\Entity\UserEntity;
use JStormes\Ldap\LdapAdapter\LdapAdapterInterface;

interface SchemaAdapterInterface
{
    public function __construct($serverString);

    /**
     * Get the DNS name or IP address of the LDAP server;
     *
     * @return string
     */
    public function getServer(): string;

    /**
     * Get the RDN syntax for the User Name to connect to the LDAP server.
     *
     * @param $username
     * @return string
     */
    public function getRdn(string $username): string;

    /**
     * Get the Raw user details from the LDAP server.
     *
     * @param LdapAdapterInterface $connector
     * @return mixed
     */
    public function getUserDetails(LdapAdapterInterface $connector);

    /**
     * Hydrate the Raw user details into a UserEntity.
     *
     * @param UserEntity $userEntity
     * @param array $results
     * @return mixed
     */
    public function hydrateUserEntity(UserEntity $userEntity, array $results);

}