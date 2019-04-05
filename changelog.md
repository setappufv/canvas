# Release Notes

## [v4.1.23](https://github.com/cnvs/canvas/compare/v4.1.22...v4.1.23)

### Fixed
- Fixed the removal of all topics and tags from a post ([e83930f](https://github.com/cnvs/canvas/commit/e83930f7e6b62e70e8d66af3601f56dc21200e1a))

## [v4.1.22](https://github.com/cnvs/canvas/compare/v4.1.21...v4.1.22)

### Changed
- Updated the favicon to an .ico format ([08e8dc6](https://github.com/cnvs/canvas/commit/08e8dc6d6a6f52aeb0e4ae033caf7103761c32c1))

## [v4.1.21](https://github.com/cnvs/canvas/compare/v4.1.20...v4.1.21)

### Changed
- Refactored the float parsing on stat view counts ([ea53999](https://github.com/cnvs/canvas/commit/ea539996fde96c5caedbcaa4ae10ac1a5b3b12fe))

### Fixed
- Included the post body in the stats index endpoint to not break the read times ([111291f](https://github.com/cnvs/canvas/commit/111291fa20ee910474467cc03aabc03a232b1a30))

## [v4.1.20](https://github.com/cnvs/canvas/compare/v4.1.19...v4.1.20)

### Added
- Added dynamic pagination to Vue component filtered lists ([ec087a4](https://github.com/cnvs/canvas/commit/ec087a4fcea738775df95df2d795e695b12d6b1d))

## [v4.1.19](https://github.com/cnvs/canvas/compare/v4.1.18...v4.1.19)

### Changed
- Removed unnecessary eager loading from the post index route ([09d01c6](https://github.com/cnvs/canvas/commit/09d01c622f04997dc23ae64ac9719a067a28b734))

### Added
- Added unit tests for the ViewThrottle middleware ([087832e](https://github.com/cnvs/canvas/commit/087832eb6b7439dbe0f9214fea99020e9eaeed39))

### Fixed
- Refactored the ViewThrottle middleware to prune posts from the session instead of simply filtering ([087832e](https://github.com/cnvs/canvas/commit/087832eb6b7439dbe0f9214fea99020e9eaeed39))

## [v4.1.18](https://github.com/cnvs/canvas/compare/v4.1.17...v4.1.18)

### Changed
- Removed the unnecessary auth check ([4e36d8c](https://github.com/cnvs/canvas/commit/4e36d8ca28939b06c3cbf23345b7c74eeae8fe6a))
- Version bump for dependencies ([fa661ea](https://github.com/cnvs/canvas/commit/fa661eafce842bcd78caf95b80fd1911ce912e05), [2c1feeb](https://github.com/cnvs/canvas/commit/2c1feeb282e1cbd319e3d8f096f052cf679ec255))

## [v4.1.17](https://github.com/cnvs/canvas/compare/v4.1.16...v4.1.17)

### Changed
- Minor branding updates ([6321678](https://github.com/cnvs/canvas/commit/63216782a497a1dc4434a806eaef100e8cac0255))

## [v4.1.16](https://github.com/cnvs/canvas/compare/v4.1.15...v4.1.16)

### Changed
- Updated the `Model::all()` usages to reduce the query sizes ([6655ecb](https://github.com/cnvs/canvas/commit/6655ecb78123e1a179c8514d85e02f9aa5d77c87), [0df1ba5](https://github.com/cnvs/canvas/commit/0df1ba52b8a972fcdc6d01f78c0af2c0a5c72c54))
- Refactored model attributes to use snake case ([d2f4784](https://github.com/cnvs/canvas/commit/d2f47840d75386f496ea9ff81a9baeb44841dd4c))
- Updated the Font Awesome library to 5.8 ([47af5b8](https://github.com/cnvs/canvas/commit/47af5b8bf11f3d62d7a189a6fc9bfb201a9fdac4))
- Updated the dark mode contrast ratios for increased readability ([a718b1b](https://github.com/cnvs/canvas/commit/a718b1bfa13223a9e73d233d336340978ea84f68))

### Added
- Added unit tests for the StoreViewData listener ([2e3aeb5](https://github.com/cnvs/canvas/commit/2e3aeb518aee9141fdec6485ca2c3844a7f98d24))
- Added unit tests for the Publish command ([637dd3f](https://github.com/cnvs/canvas/commit/637dd3fb2b1a1efd6a2c67fbeb77038737e8d725))

### Fixed
- Fixed the missing validation messages on Topics/Tags ([4d4231b](https://github.com/cnvs/canvas/commit/4d4231bd7da898e7ee28c38864944ede281cbb8d))

## [v4.1.15](https://github.com/cnvs/canvas/compare/v4.1.14...v4.1.15)

### Added
- Added a dark mode ([e3723ac](https://github.com/cnvs/canvas/commit/e3723ac6523ef000b0901f3c073a94bcad7cfebf))

## [v4.1.14](https://github.com/cnvs/canvas/compare/v4.1.13...v4.1.14)

### Fixed
- Fixed a plurality bug in the line chart components ([dc366f1](https://github.com/cnvs/canvas/commit/dc366f117c7b765d35a352bd996722f0745e17b1))
- Fixed the percentage calculations with popular reading time stats ([6222eb](https://github.com/cnvs/canvas/commit/6222ebb38654ca0c0ec17ee881977a027a6d72a0))

## [v4.1.13](https://github.com/cnvs/canvas/compare/v4.1.12...v4.1.13)

### Changed
- Refactored the test suite to be more concise and accurate ([573b6e8](https://github.com/cnvs/canvas/commit/573b6e877933fc4e0d2ef46a0686650304b5a9f8))
- Refactored the migrations into a root `database` directory ([573b6e8](https://github.com/cnvs/canvas/commit/573b6e877933fc4e0d2ef46a0686650304b5a9f8))
- Updated the `.gitignore` ([a83978b](https://github.com/cnvs/canvas/commit/a83978b63fe2d1e4b25551cd9bf81a3f9ecbb908))

### Added
- Added unit tests for the number suffix helper ([61d5b15](https://github.com/cnvs/canvas/commit/61d5b15eaee6bdf9571e5687cca9f80d4e309fe3))
