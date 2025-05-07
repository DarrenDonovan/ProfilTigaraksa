{ pkgs ? import <nixpkgs> {} }:

pkgs.mkShell {
  buildInputs = [
    pkgs.php83
    pkgs.composer
    pkgs.nodejs
    pkgs.mysql
  ];
}
