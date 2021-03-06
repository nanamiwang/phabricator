<?php

final class PhabricatorStorageManagementDatabasesWorkflow
  extends PhabricatorStorageManagementWorkflow {

  protected function didConstruct() {
    $this
      ->setName('databases')
      ->setExamples('**databases** [__options__]')
      ->setSynopsis(pht('List Phabricator databases.'));
  }

  public function didExecute(PhutilArgumentParser $args) {
    $api     = $this->getAPI();
    $patches = $this->getPatches();

    $databases = $api->getDatabaseList($patches, true);
    echo implode("\n", $databases)."\n";
    return 0;
  }

}
