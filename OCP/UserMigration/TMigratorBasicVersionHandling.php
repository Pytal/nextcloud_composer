<?php

declare(strict_types=1);

/**
 * @copyright Copyright (c) 2022 Côme Chilliet <come.chilliet@nextcloud.com>
 *
 * @author Côme Chilliet <come.chilliet@nextcloud.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCP\UserMigration;

/**
 * Basic version handling: we can import older versions but not newer ones
 * @since 24.0.0
 */
trait TMigratorBasicVersionHandling {
	protected int $version = 1;

	protected bool $mandatory = false;

	/**
	 * {@inheritDoc}
	 * @since 24.0.0
	 */
	public function getVersion(): int {
		return $this->version;
	}

	/**
	 * {@inheritDoc}
	 * @since 24.0.0
	 */
	public function canImport(
		IImportSource $importSource
	): bool {
		$version = $importSource->getMigratorVersion(static::class);
		if ($version === null) {
			return !$this->mandatory;
		}
		return ($this->version >= $version);
	}
}
