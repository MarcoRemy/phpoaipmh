<?php

/**
 * PHPOAIPMH Library
 *
 * @license http://opensource.org/licenses/MIT
 * @link https://github.com/caseyamcl/phpoaipmh
 * @Version 4.0
 * @package caseyamcl/phpoaipmh
 * @author Casey McLaughlin <caseyamcl@gmail.com>
 *
 * For the full copyright and license information, -please view the LICENSE.md
 * file that was distributed with this source code.
 *
 * ------------------------------------------------------------------
 */

declare(strict_types=1);

namespace Phpoaipmh;

use DateTimeInterface;
use SimpleXMLElement;

/**
 * OAI-PMH Endpoint Interface
 *
 * @since  v2.3
 * @author Casey McLaughlin <caseyamcl@gmail.com>
 */
interface EndpointInterface
{
    /**
     * Identify the OAI-PMH Endpoint
     *
     * @return SimpleXMLElement A XML document with attributes describing the
     *                          repository
     */
    public function identify();

    /**
     * List Metadata Formats
     *
     * Return the list of supported metadata format for a particular record (if
     * $identifier is provided), or the entire repository (if no arguments are
     * provided)
     *
     * @param  string $identifier   If specified, will return only those metadata formats that a particular
     *                              record supports
     * @return RecordIterator
     */
    public function listMetadataFormats(string $identifier = ''): RecordIteratorInterface;

    /**
     * List Record Sets
     *
     * @return RecordIterator
     */
    public function listSets(): RecordIteratorInterface;

    /**
     * Get a single record
     *
     * @param  string $id             Record Identifier
     * @param  string $metadataPrefix Required by OAI-PMH endpoint
     * @return SimpleXMLElement An XML document corresponding to the record
     */
    public function getRecord(string $id, string $metadataPrefix): SimpleXMLElement;

    /**
     * List Record identifiers
     *
     * Corresponds to OAI Verb to list record identifiers
     *
     * @param  string             $metadataPrefix      Required by OAI-PMH endpoint
     * @param  DateTimeInterface $from                An optional 'from' date for selective harvesting
     * @param  DateTimeInterface $until               An optional 'until' date for selective harvesting
     * @param  string    $set                          An optional setSpec for selective harvesting
     * @param  string    $resumptionToken              An optional resumptionToken for selective harvesting
     * @return RecordIterator
     */
    public function listIdentifiers(
        string $metadataPrefix,
        ?DateTimeInterface $from = null,
        ?DateTimeInterface $until = null,
        string $set = '',
        string $resumptionToken = ''
    ): RecordIteratorInterface;

    /**
     * List Records
     *
     * Corresponds to OAI Verb to list records
     *
     * @param  string            $metadataPrefix      Required by OAI-PMH endpoint
     * @param  DateTimeInterface $from                An optional 'from' date for selective harvesting
     * @param  DateTimeInterface $until               An optional 'from' date for selective harvesting
     * @param  string            $set                 An optional setSpec for selective harvesting
     * @param  string            $resumptionToken     An optional resumptionToken for selective harvesting
     * @return RecordIterator
     */
    public function listRecords(
        string $metadataPrefix,
        ?DateTimeInterface $from = null,
        ?DateTimeInterface $until = null,
        string $set = '',
        string $resumptionToken = ''
    ): RecordIteratorInterface;
}
