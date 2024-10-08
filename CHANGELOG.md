# Changelog

## 4.0.3.8 - 2024-10-08

### Changed
- changed show entries sync job logic to always update description fields during sync

## 4.0.3.7 - 2024-07-24

### Added
- adds ability to sync individual show entries

## 4.0.3.6 - 2024-06-13

### Fixed
- fix issue in show sync that prevented existing images from saving properly

## 4.0.3.5 - 2024-06-03

### Fixed
- add default image extension during show sync

## 4.0.3.4 - 2024-06-03

### Fixed
- Show sync Switch had an unbroken `case` resulting in invalid data
- POST body data was not correctly getting sent in Synchronize action requests 

## 4.0.3.3 - 2024-06-03

### Fixed
- Show sync was not passing required parameters to `createOrUpdateImage()` function

## 4.0.3.2 - 2024-03-21

### Fixed
- Entries not getting correct status when no availabilities are present

## 4.0.3.1 - 2024-03-20

### Fixed
- Type declaration errors in MediaSync job

## 4.0.3 - 2024-03-13

### Added
- Merge KB Media Manager logic into this version as well. Additions primarily include the ability to schedule syncs.

## 4.0.2 - 2024-03-12

### Added
- Add logic to Media Sync 'mark as stale' for items that should be manually reviewed for deletion

### Changed
- During Media Sync, skip processing of new items if availability does not have any start/end dates. If media is already in the CMS, it will be disabled and marked as stale.

## 4.0.1 - 2023-10-31

### Removed
- Remove the 'stale-media' template file that was part of the 'check for changes' feature that needed to be reverted.

## 4.0.0 - 2023-10-31

### Added
- Additional API data is available for import in the Show Sync settings, including:
  - show slug
  - show images (mezzanine, poster, black logo, white logo, color logo)
  - show links (where the show can be streamed or purchased)
  - show platform available (PBS.org, PBS App, etc.)
  - show episode availability (the date when the latest episode will no longer be available)

## 3.0.0 - 2020-06-10

- Initial release.

## 3.1.1 - 2021-06-03

- Fix episode not being populated.
- Introduce show synchronize.
