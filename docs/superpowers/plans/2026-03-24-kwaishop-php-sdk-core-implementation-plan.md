# Kwaishop PHP SDK Core Implementation Plan

## Status

- Date: 2026-03-24
- Based on: `docs/superpowers/specs/2026-03-24-kwaishop-php-sdk-core-design.md`
- Scope: `v1.0.0` core SDK foundation

## Goal

Implement the approved `v1.0.0` SDK core in small, testable increments so the repository reaches a usable first release foundation without redesigning public APIs later.

## Deliverables

- Composer package skeleton
- PSR-4 autoload structure under `src/`
- configuration layer
- signing layer with MD5 and HMAC_SHA256
- OAuth client
- Guzzle transport
- request factory
- response parser
- exception hierarchy
- main SDK client
- base resource classes and initial resource shells
- unit tests for protocol-critical components
- README quick start for the core flows

## Implementation Order

### Phase 1: Package Foundation

Deliver:

- `composer.json`
- package metadata
- runtime dependencies
- dev dependencies
- autoload and autoload-dev
- base directory structure

Acceptance criteria:

- `composer validate` passes
- classes autoload correctly
- test runner can be installed and executed

### Phase 2: Core Domain Primitives

Deliver:

- `Config`
- signer contracts and implementations
- exception hierarchy
- support utilities

Acceptance criteria:

- config object validates required credentials
- HMAC_SHA256 and MD5 signatures are deterministic
- invalid configuration fails early with explicit exceptions

### Phase 3: Transport and Request Assembly

Deliver:

- `TransportInterface`
- `GuzzleTransport`
- `RequestFactory`

Acceptance criteria:

- requests use `application/x-www-form-urlencoded`
- `param` serialization is centralized
- public parameters are assembled consistently
- signed requests can be built without resource-specific logic

### Phase 4: Response Handling

Deliver:

- `ResponseParser`
- official code mapping
- retry classification helpers

Acceptance criteria:

- success responses normalize into arrays
- platform errors map into typed exceptions
- retryable and non-retryable cases are separated

### Phase 5: OAuth Support

Deliver:

- authorize URL builder
- code-to-token exchange
- refresh token flow
- client credentials flow
- token response value object

Acceptance criteria:

- official endpoint defaults are used
- authorize URL generation is deterministic
- OAuth responses are normalized and validated

### Phase 6: Public Client and Resource Layer

Deliver:

- `KwaiShopClient`
- `AbstractResource`
- initial resource shells
- `rawRequest()`

Acceptance criteria:

- the client exposes resource accessors
- raw requests and resource calls share the same request pipeline
- the public API surface matches the approved design

### Phase 7: Tests and Docs

Deliver:

- unit tests for signers
- unit tests for request assembly
- parser tests for return code mapping
- OAuth tests with mocked transport
- README update with quick start

Acceptance criteria:

- protocol-critical paths are covered
- examples match real official parameter names
- repo is ready for iterative business API additions

## Initial File Targets

Create first:

- `composer.json`
- `src/KwaiShopClient.php`
- `src/Config/Config.php`
- `src/Exception/*`
- `src/Sign/*`
- `src/Http/*`
- `src/Request/RequestFactory.php`
- `src/Response/ResponseParser.php`
- `src/OAuth/*`
- `src/Resource/*`
- `tests/*`

## Runtime Dependencies

- `guzzlehttp/guzzle`

## Dev Dependencies

- `phpunit/phpunit`

## Coding Rules for This Plan

- PHP 8.1+ only
- typed properties and return types by default
- immutable configuration objects where practical
- no framework coupling
- keep public classes small and purpose-specific
- keep request signing and parameter assembly out of resource methods

## Risk Controls

### Risk: official signing details are easy to misapply

Mitigation:

- isolate signing in dedicated classes
- add direct signer tests
- ensure `signSecret` is the only signing secret source

### Risk: OAuth and gateway URLs may be mixed incorrectly

Mitigation:

- make API base URL and OAuth URLs separate config fields
- set safe defaults from official docs

### Risk: retry behavior may hide real business errors

Mitigation:

- retry only transport and clearly transient gateway failures
- never retry auth, sign, validation, or quota failures

### Risk: future full API coverage may force refactors

Mitigation:

- keep `rawRequest()` available from day one
- define resource boundaries before filling business methods

## Immediate Next Step

Start with Phase 1 and Phase 2 together:

- add `composer.json`
- scaffold source tree
- implement config, exceptions, and signing

This creates the minimum stable base for everything else.
